<?php

namespace App\View\Components\Hrace009\Admin;

use Illuminate\View\Component;

class ManageLink extends Component
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
        if (request()->routeIs('admin.ingamemanage.broadcast')) {
            $status = 'true';
            $textBroadcast = '700';
            $lightBroadcast = 'text-light';
            $textMailer = '400';
            $lightMailer = 'text-gray-400';
        } elseif (request()->routeIs('admin.ingamemanage.mailer')) {
            $status = 'true';
            $textBroadcast = '400';
            $lightBroadcast = 'text-gray-400';
            $textMailer = '700';
            $lightMailer = 'text-light';
        } else {
            $status = 'false';
            $textBroadcast = '400';
            $lightBroadcast = 'text-gray-400';
            $textMailer = '400';
            $lightMailer = 'text-gray-400';
        }

        return view('components.hrace009.admin.manage-link', [
            'status' => $status,
            'textBroadcast' => $textBroadcast,
            'lightBroadcast' => $lightBroadcast,
            'textMailer' => $textMailer,
            'lightMailer' => $lightMailer
        ]);
    }
}
