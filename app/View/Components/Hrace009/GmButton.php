<?php

namespace App\View\Components\Hrace009;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class GmButton extends Component
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
        if (Auth::user()->isGamemaster() or Auth::user()->isAdministrator()) {
            return view('components.hrace009.gm-button');
        }
        return false;
    }
}
