<?php


/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\View\Components\Hrace009;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\View\Component;

class LanguageButton extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        $languages = [];
        $folders = File::directories(base_path('resources/lang/'));
        foreach ($folders as $folder) {
            $languages[] = str_replace('\\', '', last(explode('/', $folder)));
        }
        return view('components.hrace009.language-button', [
            'languages' => $languages
        ]);
    }
}
