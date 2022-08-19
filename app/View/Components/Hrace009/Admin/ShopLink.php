<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\View\Components\Hrace009\Admin;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShopLink extends Component
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
        if (request()->routeIs('shop.index')) {
            $status = 'true';
            $createShopText = '400';
            $createShopLight = 'text-gray-400';
            $viewShopText = '700';
            $viewShopLight = 'text-light';
            $settingsShopText = '400';
            $settingsShopLight = 'text-gray-400';
        } elseif (request()->routeIs('shop.create')) {
            $status = 'true';
            $createShopText = '700';
            $createShopLight = 'text-light';
            $viewShopText = '400';
            $viewShopLight = 'text-gray-400';
            $settingsShopText = '400';
            $settingsShopLight = 'text-gray-400';
        } elseif (request()->routeIs('shop.edit')) {
            $status = 'true';
            $createShopText = '400';
            $createShopLight = 'text-gray-400';
            $viewShopText = '400';
            $viewShopLight = 'text-gray-400';
            $settingsShopText = '400';
            $settingsShopLight = 'text-gray-400';
        } elseif (request()->routeIs('admin.shop.settings')) {
            $status = 'true';
            $createShopText = '400';
            $createShopLight = 'text-gray-400';
            $viewShopText = '400';
            $viewShopLight = 'text-gray-400';
            $settingsShopText = '700';
            $settingsShopLight = 'text-light';
        } else {
            $status = 'false';
            $createShopText = '400';
            $createShopLight = 'text-gray-400';
            $viewShopText = '400';
            $viewShopLight = 'text-gray-400';
            $settingsShopText = '400';
            $settingsShopLight = 'text-gray-400';
        }
        return view('components.hrace009.admin.shop-link', [
            'status' => $status,
            'createText' => $createShopText,
            'createLight' => $createShopLight,
            'viewText' => $viewShopText,
            'viewLight' => $viewShopLight,
            'settingsText' => $settingsShopText,
            'settingsLight' => $settingsShopLight
        ]);
    }
}
