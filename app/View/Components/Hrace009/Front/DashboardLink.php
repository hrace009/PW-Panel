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
        if (request()->routeIs('dashboard') or request()->routeIs('profile.show')) {
            $status = 'true';
            if (request()->routeIs('dashboard')) {
                $dashText = '700';
                $dashLight = 'text-light';
                $profileText = '400';
                $profileLight = 'text-gray-400';
            } elseif (request()->routeIs('profile.show')) {
                $dashText = '400';
                $dashLight = 'text-gray-400';
                $profileText = '700';
                $profileLight = 'text-light';
            } else {
                $dashText = '400';
                $dashLight = 'text-gray-400';
                $profileText = '400';
                $profileLight = 'text-gray-400';
            }
        } else {
            $status = 'false';
            $dashText = '400';
            $dashLight = 'text-gray-400';
            $profileText = '400';
            $profileLight = 'text-gray-400';
        }
        return view('components.hrace009.front.dashboard-link', [
            'status' => $status,
            'dashText' => $dashText,
            'dashLight' => $dashLight,
            'profileText' => $profileText,
            'profileLight' => $profileLight
        ]);
    }
}
