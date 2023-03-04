<?php





/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\View\Components\Hrace009;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Balance extends Component
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
     * @return View|Closure|string
     */
    public function render()
    {
        $balance = number_format((Auth::user()->money), 0, '', '.') . ' ' . config('pw-config.currency_name');
        $poin = number_format((Auth::user()->bonuses), 0, '', '.') . ' ' . __('vote.create.type_bonusess');
        return view('components.hrace009.balance', [
            'balance' => $balance,
            'poin' => $poin
        ]);
    }
}
