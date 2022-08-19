<?php


namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class Hrace009Validation extends ServiceProvider
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
    public function boot()
    {
        Validator::extend('channel_available', static function ($attribute, $value, $parameters, $validator) {
            if (config('pw-config.server_version') === '07' && $value === 12) {
                return FALSE;
            }
            return TRUE;
        });
    }
}
