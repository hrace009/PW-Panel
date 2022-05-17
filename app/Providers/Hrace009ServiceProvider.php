<?php


/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\Providers;

use hrace009\PerfectWorldAPI\API;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class Hrace009ServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        Blade::componentNamespace('App\View\Components\Hrace009', 'hrace009');

        view()->composer(['admin.shop.create', 'admin.shop.edit', 'admin.manage.mailer'], static function ($view) {
            $masks = [
                0 => __('shop.masks.0'),
                1 => __('shop.masks.1'),
                __('shop.equipment') => [
                    2 => __('shop.masks.armor.2'),
                    16 => __('shop.masks.armor.16'),
                    64 => __('shop.masks.armor.64'),
                    128 => __('shop.masks.armor.128'),
                    256 => __('shop.masks.armor.256'),
                    8 => __('shop.masks.armor.8'),
                    //1073741826 => __('shop.masks.armor.1073741826'),
                    //1073741832 => __('shop.masks.armor.1073741832'),
                ],
                __('shop.fashion') => [
                    8192 => __('shop.masks.fashion.8192'),
                    16384 => __('shop.masks.fashion.16384'),
                    32768 => __('shop.masks.fashion.32768'),
                    65536 => __('shop.masks.fashion.65536'),
                    //33554432 => __( 'shop.masks.fashion.33554432' ),
                    //536870912 => __( 'shop.masks.fashion.536870912' )
                ],
                __('shop.accessories') => [
                    1536 => __('shop.masks.accessories.1536'),
                    4 => __('shop.masks.accessories.4'),
                    32 => __('shop.masks.accessories.32')
                ],
                __('shop.charms') => [
                    1048576 => __('shop.masks.charms.1048576'),
                    2097152 => __('shop.masks.charms.2097152')
                ],
                //2048 => __( 'shop.masks.2048' ),
                4096 => __('shop.masks.4096'),
                //131072 => __('shop.masks.131072'),
                262144 => __('shop.masks.262144'),
                524288 => __('shop.masks.524288'),
                //8388608 => __('shop.masks.8388608'),
                //2147483711 => __('shop.masks.2147483711'),
            ];
            $view->with('masks', $masks);
        });

        view()->composer([
            'components.hrace009.character-selector',
            'livewire.profile.list-character',
            'components.hrace009.front.widget',
            'profile.show',
            'components.hrace009.admin.port-status',
            'components.hrace009.admin.game-stat'
        ], static function ($view) {
            $api = new API();
            $roles = Auth::user()->roles();
            $view->with([
                'api' => $api,
                'roles' => $roles
            ]);
        });
    }
}
