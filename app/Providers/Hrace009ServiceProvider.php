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
                0 => trans('shop.masks.0'),
                1 => trans('shop.masks.1'),
                trans('shop.equipment') => [
                    2 => trans('shop.masks.armor.2'),
                    16 => trans('shop.masks.armor.16'),
                    64 => trans('shop.masks.armor.64'),
                    128 => trans('shop.masks.armor.128'),
                    256 => trans('shop.masks.armor.256'),
                    8 => trans('shop.masks.armor.8')
                ],
                trans('shop.fashion') => [
                    8192 => trans('shop.masks.fashion.8192'),
                    16384 => trans('shop.masks.fashion.16384'),
                    32768 => trans('shop.masks.fashion.32768'),
                    65536 => trans('shop.masks.fashion.65536'),
                    //33554432 => trans( 'shop.masks.fashion.33554432' ),
                    //536870912 => trans( 'shop.masks.fashion.536870912' )
                ],
                trans('shop.accessories') => [
                    1536 => trans('shop.masks.accessories.1536'),
                    4 => trans('shop.masks.accessories.4'),
                    32 => trans('shop.masks.accessories.32')
                ],
                trans('shop.charms') => [
                    1048576 => trans('shop.masks.charms.1048576'),
                    2097152 => trans('shop.masks.charms.2097152')
                ],
                //2048 => trans( 'shop.masks.2048' ),
                262144 => trans('shop.masks.262144'),
                524288 => trans('shop.masks.524288'),
                4096 => trans('shop.masks.4096')
            ];
            $view->with('masks', $masks);
        });

        view()->composer('*', static function ($view) {
            $api = new API();
            $roles = Auth::user()->roles();
            $view->with([
                'api' => $api,
                'roles' => $roles
            ]);
        });
    }
}
