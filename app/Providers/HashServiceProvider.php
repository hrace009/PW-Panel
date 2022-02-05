<?php


/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\Providers;

use App\Providers\Hash\Base64Hash;
use App\Providers\Hash\BinSaltHash;
use App\Providers\Hash\MD5Hash;
use Illuminate\Support\ServiceProvider;

class HashServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('hash', function () {
            switch (config('pw-config.encryption_type')) {
                case 'md5':
                    return new MD5Hash();
                    break;

                case 'base64':
                    return new Base64Hash();
                    break;

                case 'binsalt':
                    return new BinSaltHash();
                    break;

                default:
                    return new MD5Hash();
                    break;
            }

        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['hash'];
    }
}
