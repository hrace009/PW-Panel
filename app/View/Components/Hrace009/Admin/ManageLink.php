<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

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
            $textForbid = '400';
            $lightForbid = 'text-gray-400';
            $textGM = '400';
            $lightGM = 'text-gray-400';
        } elseif (request()->routeIs('admin.ingamemanage.mailer')) {
            $status = 'true';
            $textBroadcast = '400';
            $lightBroadcast = 'text-gray-400';
            $textMailer = '700';
            $lightMailer = 'text-light';
            $textForbid = '400';
            $lightForbid = 'text-gray-400';
            $textGM = '400';
            $lightGM = 'text-gray-400';
        } elseif (request()->routeIs('admin.ingamemanage.forbid')) {
            $status = 'true';
            $textBroadcast = '400';
            $lightBroadcast = 'text-gray-400';
            $textMailer = '400';
            $lightMailer = 'text-gray-400';
            $textForbid = '700';
            $lightForbid = 'text-light';
            $textGM = '400';
            $lightGM = 'text-gray-400';
        } elseif (request()->routeIs('admin.ingamemanage.gm')) {
            $status = 'true';
            $textBroadcast = '400';
            $lightBroadcast = 'text-gray-400';
            $textMailer = '400';
            $lightMailer = 'text-gray-400';
            $textForbid = '400';
            $lightForbid = 'text-gray-400';
            $textGM = '700';
            $lightGM = 'text-light';
        } else {
            $status = 'false';
            $textBroadcast = '400';
            $lightBroadcast = 'text-gray-400';
            $textMailer = '400';
            $lightMailer = 'text-gray-400';
            $textForbid = '400';
            $lightForbid = 'text-gray-400';
            $textGM = '400';
            $lightGM = 'text-gray-400';
        }

        return view('components.hrace009.admin.manage-link', [
            'status' => $status,
            'textBroadcast' => $textBroadcast,
            'lightBroadcast' => $lightBroadcast,
            'textMailer' => $textMailer,
            'lightMailer' => $lightMailer,
            'textForbid' => $textForbid,
            'lightForbid' => $lightForbid,
            'textGM' => $textGM,
            'lightGM' => $lightGM
        ]);
    }
}
