<?php

namespace App\View\Components\Hrace009\Front;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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
     * @return Application|Factory|View
     */
    public function render()
    {
        if (request()->routeIs('app.dashboard')) {
            $status = 'true';
        } else {
            $status = 'false';
        }
        return view('components.hrace009.front.dashboard-link', [
            'status' => $status
        ]);
    }
}
