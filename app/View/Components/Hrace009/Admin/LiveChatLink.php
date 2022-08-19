<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\View\Components\Hrace009\Admin;

use Illuminate\View\Component;

class LiveChatLink extends Component
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
        if (request()->routeIs('admin.chat.watch')) {
            $status = 'true';
            $textIndex = '700';
            $lightIndex = 'text-light';
            $textConfig = '400';
            $lightConfig = 'text-gray-400';
        } elseif (request()->routeIs('admin.chat.settings')) {
            $status = 'true';
            $textIndex = '400';
            $lightIndex = 'text-gray-400';
            $textConfig = '700';
            $lightConfig = 'text-light';
        } else {
            $status = 'false';
            $textIndex = '400';
            $lightIndex = 'text-gray-400';
            $textConfig = '400';
            $lightConfig = 'text-gray-400';
        }
        return view('components.hrace009.admin.live-chat-link', [
            'status' => $status,
            'textIndex' => $textIndex,
            'textConfig' => $textConfig,
            'lightIndex' => $lightIndex,
            'lightConfig' => $lightConfig
        ]);
    }
}
