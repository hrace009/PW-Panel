<?php

namespace App\View\Components\Hrace009\Admin;

use Illuminate\View\Component;

class ServiceLink extends Component
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
        if (request()->routeIs('admin.service.settings')) {
            $status = 'true';
            $textCreate = '700';
            $lightCreate = 'text-light';
            $textIndex = '400';
            $lightIndex = 'text-gray-400';
        } elseif (request()->routeIs('service.index')) {
            $status = 'true';
            $textCreate = '400';
            $lightCreate = 'text-gray-400';
            $textIndex = '700';
            $lightIndex = 'text-light';
        } else {
            $status = 'false';
            $textCreate = '400';
            $lightCreate = 'text-gray-400';
            $textIndex = '400';
            $lightIndex = 'text-gray-400';
        }
        return view('components.hrace009.admin.service-link', [
            'status' => $status,
            'textCreate' => $textCreate,
            'lightCreate' => $lightCreate,
            'textIndex' => $textIndex,
            'lightIndex' => $lightIndex
        ]);
    }
}
