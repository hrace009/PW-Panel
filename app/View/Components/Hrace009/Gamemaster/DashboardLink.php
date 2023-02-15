<?php

namespace App\View\Components\Hrace009\Gamemaster;

use Illuminate\View\Component;

class DashboardLink extends Component
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
        if (request()->routeIs('gm.dashboard')) {
            $status = 'true';
        } else {
            $status = 'false';
        }
        return view('components.hrace009.gamemaster.dashboard-link', [
            'status' => $status
        ]);
    }
}
