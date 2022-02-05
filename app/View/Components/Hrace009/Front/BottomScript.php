<?php


/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\View\Components\Hrace009\Front;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BottomScript extends Component
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
        return view('components.hrace009.front.bottom-script');
    }
}
