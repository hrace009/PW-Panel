<?php


/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\View\Components\Hrace009;

use hrace009\PerfectWorldAPI\API;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class CharacterSelector extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.hrace009.character-selector', [
            'api' => new API(),
            'roles' => Auth::user()->roles(),
        ]);
    }

    /**
     * @param $role_id
     * @return RedirectResponse
     */
    public function getSelect($role_id): RedirectResponse
    {
        $api = new API();
        if (config('pw-config.server_version') === '07') {
            $role_name = null;
            $roles = $api->getRoles(Auth::user()->ID);
            foreach ($roles['roles'] as $role) {
                if ($role_id === $role['id']) {
                    $role_name = $role['name'];
                }
            }
            session()->put('character_id', $role_id);
            session()->put('character_name', $role_name);
            $type = 'success';
            $message = __('general.character.success');
        } else {
            $role_data = $api->getRole($role_id);
            if (isset($role_data)) {
                session()->put('character_id', $role_data['base']['id']);
                session()->put('character_name', $role_data['base']['name']);
                $type = 'success';
                $message = __('general.character.success');
            } else {
                $type = 'warning';
                $message = __('general.character.error.role');
            }
        }
        return redirect()->back()->with($type, $message);
    }
}
