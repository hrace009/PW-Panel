<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\View\Components\Hrace009;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class MobileBalance extends Component
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
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $balance = Auth::user()->money . ' ' . config('pw-config.currency_name');
        return view('components.hrace009.mobile-balance', [
            'balance' => $balance,
        ]);
    }
}
