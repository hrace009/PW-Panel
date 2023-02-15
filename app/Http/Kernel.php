<?php






/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Http;

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\BankTransferActive;
use App\Http\Middleware\DonateActive;
use App\Http\Middleware\DonateAntiSpam;
use App\Http\Middleware\EncryptCookies;
use App\Http\Middleware\IngameService;
use App\Http\Middleware\IpaymuActive;
use App\Http\Middleware\isAdministrator;
use App\Http\Middleware\isGamemaster;
use App\Http\Middleware\NewsActive;
use App\Http\Middleware\PaymentwallActive;
use App\Http\Middleware\PaymentwallPingback;
use App\Http\Middleware\PaypalActive;
use App\Http\Middleware\PreventRequestsDuringMaintenance;
use App\Http\Middleware\RankingActive;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\SelectedCharacter;
use App\Http\Middleware\ServerOnline;
use App\Http\Middleware\ServiceEnabled;
use App\Http\Middleware\SetLanguage;
use App\Http\Middleware\ShopActive;
use App\Http\Middleware\TrimStrings;
use App\Http\Middleware\TrustProxies;
use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Middleware\VoteActive;
use App\Http\Middleware\VoucherActive;
use Fruitcake\Cors\HandleCors;
use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Http\Middleware\SetCacheHeaders;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Routing\Middleware\ValidateSignature;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Laravel\Jetstream\Http\Middleware\AuthenticateSession;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        TrustProxies::class,
        HandleCors::class,
        PreventRequestsDuringMaintenance::class,
        ValidatePostSize::class,
        TrimStrings::class,
        ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            EncryptCookies::class,
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            AuthenticateSession::class,
            ShareErrorsFromSession::class,
            VerifyCsrfToken::class,
            SubstituteBindings::class,
            SetLanguage::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth' => Authenticate::class,
        'auth.basic' => AuthenticateWithBasicAuth::class,
        'cache.headers' => SetCacheHeaders::class,
        'can' => Authorize::class,
        'guest' => RedirectIfAuthenticated::class,
        'password.confirm' => RequirePassword::class,
        'signed' => ValidateSignature::class,
        'throttle' => ThrottleRequests::class,
        'verified' => EnsureEmailIsVerified::class,
        /*
         * Perfect World Middleware
         */
        'server.online' => ServerOnline::class,
        'admin' => isAdministrator::class,
        'gm' => isGamemaster::class,
        'news' => NewsActive::class,
        'shop' => ShopActive::class,
        'donate' => DonateActive::class,
        'voucher' => VoucherActive::class,
        'vote' => VoteActive::class,
        'service' => IngameService::class,
        'ranking' => RankingActive::class,
        'selected.character' => SelectedCharacter::class,
        'donate.anti.spam' => DonateAntiSpam::class,
        'bank.active.form' => BankTransferActive::class,
        'paymentwall.active' => PaymentwallActive::class,
        'paymentwall.pingback' => PaymentwallPingback::class,
        'paypal.active' => PaypalActive::class,
        'service.enable' => ServiceEnabled::class,
        'ipaymu.active' => IpaymuActive::class
    ];
}
