<?php

namespace App\View\Components\Hrace009\Admin;

use Illuminate\View\Component;

class SystemLink extends Component
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
        if (request()->routeIs('admin.application')) {
            $status = 'true';
            $appText = '700';
            $appLight = 'text-light';
            $settingsText = '400';
            $settingsLight = 'text-gray-400';
        } elseif (request()->routeIs('admin.settings')) {
            $status = 'true';
            $appText = '400';
            $appLight = 'text-gray-400';
            $settingsText = '700';
            $settingsLight = 'text-light';
        } else {
            $status = 'false';
            $appText = '400';
            $appLight = 'text-gray-400';
            $settingsText = '400';
            $settingsLight = 'text-gray-400';
        }
        return view('components.hrace009.admin.system-link', [
            'status' => $status,
            'appText' => $appText,
            'appLight' => $appLight,
            'settingsText' => $settingsText,
            'settingsLight' => $settingsLight,
        ]);
    }
}
