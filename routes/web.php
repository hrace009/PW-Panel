<?php





/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

use App\Http\Controllers\Admin\MembersController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\VoteController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Front\UserProfileController;
use App\Http\Controllers\Gamemaster\ArticleController;
use App\Http\Controllers\Gamemaster\PlayersController;
use App\Http\Middleware\VerifyCsrfToken;
use App\View\Components\Hrace009\CharacterSelector;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\ConfirmablePasswordController;
use Laravel\Fortify\Http\Controllers\ConfirmedPasswordStatusController;
use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController;
use Laravel\Fortify\Http\Controllers\EmailVerificationPromptController;
use Laravel\Fortify\Http\Controllers\PasswordController;
use Laravel\Fortify\Http\Controllers\ProfileInformationController;
use Laravel\Fortify\Http\Controllers\RecoveryCodeController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\TwoFactorQrCodeController;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController;
use Laravel\Jetstream\Http\Controllers\Livewire\PrivacyPolicyController;
use Laravel\Jetstream\Http\Controllers\Livewire\TeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\TermsOfServiceController;
use Laravel\Jetstream\Http\Controllers\TeamInvitationController;
use Laravel\Jetstream\Jetstream;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'web'], static function () {
    Route::get('/', [
        'as' => 'HOME',
        'uses' => 'App\Http\Controllers\Website\Home@index'
    ]);

    Route::get('news/{slug}', [
        'as' => 'show.article',
        'uses' => 'App\Http\Controllers\Website\Home@showPost'
    ]);

    Route::get('news/category/{category}', [
        'as' => 'show.article.by.category',
        'uses' => 'App\Http\Controllers\Website\Home@indexCategory'
    ]);

    Route::get('news/tags/{tag}', [
        'as' => 'show.article.tag',
        'uses' => 'App\Http\Controllers\Website\Home@indexTags'
    ]);
});

/* App Page */
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'web', 'verified']], static function () {

    Route::get('/', [
        'as' => 'app.dashboard',
        'uses' => 'App\Http\Controllers\Front\Dashboard@getIndex'
    ]);

    /***
     * Shop Routing
     */
    Route::group(['prefix' => 'shop', 'middleware' => 'shop'], static function () {
        Route::get('/', [
            'as' => 'app.shop.index',
            'uses' => 'App\Http\Controllers\Front\ShopController@getIndex'
        ]);
        Route::post('purchase/{shop}', [
            'as' => 'app.shop.purchase.post',
            'uses' => 'App\Http\Controllers\Front\ShopController@postPurchase'
        ]);
        Route::post('point/{shop}', [
            'as' => 'app.shop.point.post',
            'uses' => 'App\Http\Controllers\Front\ShopController@postPoint'
        ]);
        Route::post('gift/{shop}', [
            'as' => 'app.shop.gift.post',
            'uses' => 'App\Http\Controllers\Front\ShopController@postGift'
        ]);
        Route::get('mask/{shop_mask}', [
            'as' => 'app.shop.mask',
            'uses' => 'App\Http\Controllers\Front\ShopController@getMask'
        ]);
    });

    /***
     * Donate Routing
     */
    Route::group(['prefix' => 'donate', 'middleware' => 'donate'], static function () {
        Route::get('paypal', [
            'as' => 'app.donate.paypal',
            'middleware' => 'paypal.active',
            'uses' => 'App\Http\Controllers\Front\DonateController@getPaypalIndex'
        ]);

        Route::post('paypal/submit', [
            'as' => 'app.donate.paypal.submit',
            'middleware' => 'paypal.active',
            'uses' => 'App\Http\Controllers\Front\DonateController@postPaypalSubmit'
        ]);

        Route::get('paypal/complete', [
            'as' => 'app.donate.paypal.complete',
            'middleware' => 'paypal.active',
            'uses' => 'App\Http\Controllers\Front\DonateController@postPaypalComplete'
        ]);

        Route::get('bank', [
            'as' => 'app.donate.bank',
            'middleware' => 'bank.active.form',
            'uses' => 'App\Http\Controllers\Front\DonateController@getBankIndex'
        ]);
        Route::post('postBank', [
            'as' => 'app.donate.bank.post',
            'middleware' => 'donate.anti.spam',
            'uses' => 'App\Http\Controllers\Front\DonateController@postBank'
        ]);
        Route::get('paymentwall', [
            'as' => 'app.donate.paymentwall',
            'middleware' => 'paymentwall.active',
            'uses' => 'App\Http\Controllers\Front\DonateController@getPaymentwallIndex'
        ]);
        Route::get('history', [
            'as' => 'app.donate.history',
            'uses' => 'App\Http\Controllers\Front\DonateController@getHistoryIndex'
        ]);

        Route::get('ipaymu', [
            'as' => 'app.donate.ipaymu',
            'middleware' => 'ipaymu.active',
            'uses' => 'App\Http\Controllers\Front\DonateController@getIpaymuIndex'
        ]);

        Route::post('ipaymu/submit', [
            'as' => 'app.donate.ipaymu.submit',
            'middleware' => 'ipaymu.active',
            'uses' => 'App\Http\Controllers\Front\DonateController@postIpaymuSubmit'
        ]);

        Route::get('ipaymu/complete', [
            'as' => 'app.donate.ipaymu.complete',
            'middleware' => 'ipaymu.active',
            'uses' => 'App\Http\Controllers\Front\DonateController@postIpaymuComplete'
        ]);
    });

    /***
     * Vote Routing
     */
    Route::group(['prefix' => 'vote', 'middleware' => 'vote'], static function () {
        Route::get('/', [
            'as' => 'app.vote.index',
            'uses' => 'App\Http\Controllers\Front\VoteController@getIndex'
        ]);

        Route::post('check/{site}', [
            'as' => 'app.vote.check',
            'uses' => 'App\Http\Controllers\Front\VoteController@postCheck'
        ]);

        Route::get('success/{site}', [
            'as' => 'app.vote.success',
            'uses' => 'App\Http\Controllers\Front\VoteController@getSuccess'
        ]);

        Route::post('submit/{site}', [
            'as' => 'app.vote.submit',
            'uses' => 'App\Http\Controllers\Front\VoteController@postSubmit'
        ]);

        Route::group(['prefix' => 'arena', 'middleware' => 'arena.active'], static function () {
            Route::post('submit', [
                'as' => 'app.vote.arena.submit',
                'uses' => 'App\Http\Controllers\Front\VoteController@arenaSubmit'
            ]);
        });
    });

    /***
     * Voucher
     */
    Route::group(['prefix' => 'voucher', 'middleware' => 'voucher'], static function () {
        Route::get('/', [
            'as' => 'app.voucher.index',
            'uses' => 'App\Http\Controllers\Front\VoucherController@getIndex'
        ]);

        Route::post('redem', [
            'as' => 'app.voucher.postRedem',
            'uses' => 'App\Http\Controllers\Front\VoucherController@postRedem'
        ]);
    });

    /***
     * Services
     */
    Route::group(['prefix' => 'services', 'middleware' => 'service'], static function () {
        Route::get('/', [
            'as' => 'app.services.index',
            'uses' => 'App\Http\Controllers\Front\ServiceController@getIndex'
        ]);

        Route::post('{service}', [
            'as' => 'app.services.post',
            'uses' => 'App\Http\Controllers\Front\ServiceController@postPurchase'
        ]);
    });

    /***
     * Ranking
     */
    Route::group(['prefix' => 'ranking', 'middleware' => 'ranking'], static function () {
        Route::get('/', [
            'as' => 'app.ranking.index',
            'uses' => 'App\Http\Controllers\Front\RankingController@getIndex'
        ]);

        Route::get('player/{sub}', [
            'as' => 'app.ranking.player',
            'uses' => 'App\Http\Controllers\Front\RankingController@getPlayers'
        ]);

        Route::get('faction/{sub}', [
            'as' => 'app.ranking.faction',
            'uses' => 'App\Http\Controllers\Front\RankingController@getFactions'
        ]);
    });
});

/* Character Route */
Route::group(['middleware' => ['web', 'auth', 'verified', 'server.online']], static function () {
    /* Character */
    Route::get('character/select/{role_id}', [CharacterSelector::class, 'getSelect']);
});

/* Admin Page */
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'web', 'verified', 'admin']], static function () {
    Route::get('/', static function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::group(['prefix' => 'system'], static function () {
        Route::get('apps', [
            'as' => 'admin.application',
            'uses' => 'App\Http\Controllers\Admin\SystemController@getApps'
        ]);

        Route::post('apps', [
            'as' => 'admin.application.post',
            'uses' => 'App\Http\Controllers\Admin\SystemController@saveApps'
        ]);

        Route::get('settings', [
            'as' => 'admin.settings',
            'uses' => 'App\Http\Controllers\Admin\SystemController@getSettings'
        ]);

        Route::post('settings', [
            'as' => 'admin.settings.post',
            'uses' => 'App\Http\Controllers\Admin\SystemController@saveSettings'
        ]);

    });

    Route::group(['prefix' => 'members'], static function () {

        Route::get('search', [
            'as' => 'admin.manage.search',
            'uses' => 'App\Http\Controllers\Admin\MembersController@search'
        ]);

        Route::post('balance/{user}', [
            'as' => 'admin.manage.balance',
            'uses' => 'App\Http\Controllers\Admin\MembersController@addBalance'
        ]);

        Route::post('resetPassPin/{user}', [
            'as' => 'admin.manage.resetPassPin',
            'uses' => 'App\Http\Controllers\Admin\MembersController@forceResetPasswordPin'
        ]);

        Route::post('changeEmail/{user}', [
            'as' => 'admin.manage.chEmail',
            'uses' => 'App\Http\Controllers\Admin\MembersController@changeEmail'
        ]);
    });
    Route::resource('members', MembersController::class);

    Route::group(['prefix' => 'news', 'middleware' => 'news' ], static function () {

        Route::get('settings', [
            'as' => 'admin.news.settings',
            'uses' => 'App\Http\Controllers\Admin\NewsController@settings'
        ]);

        Route::post('upload', [
            'as' => 'admin.news.upload',
            'uses' => 'App\Http\Controllers\Admin\NewsController@upload'
        ])->withoutMiddleware([VerifyCsrfToken::class]);

        Route::post('updateSettings', [
            'as' => 'admin.news.postSettings',
            'uses' => 'App\Http\Controllers\Admin\NewsController@postSettings'
        ]);

    });
    Route::resource('news', NewsController::class)->middleware('news');

    Route::group(['prefix' => 'shop', 'middleware' => 'shop'], static function () {

        Route::get('settings', [
            'as' => 'admin.shop.settings',
            'uses' => 'App\Http\Controllers\Admin\ShopController@settings'
        ]);

        Route::post('updateSettings', [
            'as' => 'admin.shop.postSettings',
            'uses' => 'App\Http\Controllers\Admin\ShopController@saveSettings'
        ]);

        Route::post('upload', [
            'as' => 'admin.shop.upload',
            'uses' => 'App\Http\Controllers\Admin\ShopController@upload'
        ])->withoutMiddleware([VerifyCsrfToken::class]);

    });
    Route::resource('shop', ShopController::class)->middleware('shop');

    Route::group(['prefix' => 'donate', 'middleware' => 'donate'], static function () {

        Route::get('paymentwall', [
            'as' => 'admin.donate.paymentwall',
            'uses' => 'App\Http\Controllers\Admin\DonateController@showPaymentwall'
        ]);

        Route::get('banktransfer', [
            'as' => 'admin.donate.banktransfer',
            'uses' => 'App\Http\Controllers\Admin\DonateController@showBank'
        ]);

        Route::get('confirm', [
            'as' => 'admin.donate.bankconfirm',
            'uses' => 'App\Http\Controllers\Admin\DonateController@showConfirm'
        ]);

        Route::post('updateConfirm/{id}', [
            'as' => 'admin.donate.updateconfirm',
            'uses' => 'App\Http\Controllers\Admin\DonateController@updateBankLog'
        ]);

        Route::post('paymentwallPost', [
            'as' => 'admin.donate.paymentwall.post',
            'uses' => 'App\Http\Controllers\Admin\DonateController@postPaymentwall'
        ]);

        Route::post('bankPost', [
            'as' => 'admin.donate.bank.post',
            'uses' => 'App\Http\Controllers\Admin\DonateController@postBank'
        ]);

        Route::get('paypal', [
            'as' => 'admin.donate.paypal',
            'uses' => 'App\Http\Controllers\Admin\DonateController@showPaypal'
        ]);

        Route::post('paypalPost', [
            'as' => 'admin.donate.paypal.post',
            'uses' => 'App\Http\Controllers\Admin\DonateController@postPaypal'
        ]);

        Route::get('ipaymu', [
            'as' => 'admin.donate.ipaymu',
            'uses' => 'App\Http\Controllers\Admin\DonateController@showIpaymu'
        ]);

        Route::post('ipaymuPost', [
            'as' => 'admin.donate.ipaymu.post',
            'uses' => 'App\Http\Controllers\Admin\DonateController@postIpaymu'
        ]);

        Route::get('history', [
            'as' => 'admin.donate.history',
            'uses' => 'App\Http\Controllers\Admin\DonateController@getHistory'
        ]);
    });

    Route::resource('voucher', VoucherController::class)->middleware('voucher');

    Route::group(['prefix' => 'vote', 'middleware' => 'vote'], static function () {
        Route::get('arena', [
            'as' => 'admin.vote.arena',
            'uses' => 'App\Http\Controllers\Admin\VoteController@getArena'
        ]);

        Route::post('submitArena', [
            'as' => 'admin.vote.arena.submit',
            'uses' => 'App\Http\Controllers\Admin\VoteController@postArena',
        ]);
    });
    Route::resource('vote', VoteController::class)->parameter('vote', 'site')->middleware('vote');

    Route::group(['prefix' => 'service', 'middleware' => 'service'], static function () {
        Route::get('settings', [
            'as' => 'admin.service.settings',
            'uses' => 'App\Http\Controllers\Admin\ServiceController@settings'
        ]);

        Route::post('updateSettings', [
            'as' => 'admin.service.updateSettings',
            'uses' => 'App\Http\Controllers\Admin\ServiceController@updateSettings'
        ]);
    });
    Route::resource('service', ServiceController::class)->middleware('service');

    Route::group(['prefix' => 'ranking', 'middleware' => 'ranking'], static function () {
        Route::get('settings', [
            'as' => 'admin.ranking.settings',
            'uses' => 'App\Http\Controllers\Admin\RankingController@getSettings'
        ]);

        Route::post('updateSettings', [
            'as' => 'admin.ranking.postSettings',
            'uses' => 'App\Http\Controllers\Admin\RankingController@postSettings'
        ]);

        Route::get('updatePlayers', [
            'as' => 'admin.ranking.updatePlayers',
            'middleware' => 'server.online',
            'uses' => 'App\Http\Controllers\Admin\RankingController@updatePlayer'
        ]);

        Route::get('updateFaction', [
            'as' => 'admin.ranking.updateFaction',
            'middleware' => 'server.online',
            'uses' => 'App\Http\Controllers\Admin\RankingController@updateFaction'
        ]);

        Route::get('updateTerritories', [
            'as' => 'admin.ranking.updateTerritories',
            'middleware' => 'server.online',
            'uses' => 'App\Http\Controllers\Admin\RankingController@updateTerritories'
        ]);
    });

    Route::group(['prefix' => 'manage'], static function () {
        Route::get('broadcast', [
            'as' => 'admin.ingamemanage.broadcast',
            'uses' => 'App\Http\Controllers\Admin\ManageController@getBroadcast'
        ]);

        Route::post('broadcast', [
            'as' => 'admin.ingamemanage.postBroadcast',
            'uses' => 'App\Http\Controllers\Admin\ManageController@postBroadcast'
        ]);

        Route::get('mailer', [
            'as' => 'admin.ingamemanage.mailer',
            'uses' => 'App\Http\Controllers\Admin\ManageController@getMailer'
        ]);

        Route::post('mailer', [
            'as' => 'admin.ingamemanage.postMailer',
            'uses' => 'App\Http\Controllers\Admin\ManageController@postMailer'
        ]);

        Route::get('forbid', [
            'as' => 'admin.ingamemanage.forbid',
            'uses' => 'App\Http\Controllers\Admin\ManageController@getForbid'
        ]);

        Route::post('forbid', [
            'as' => 'admin.ingamemanage.postForbid',
            'uses' => 'App\Http\Controllers\Admin\ManageController@postForbid'
        ]);

        Route::get('gm', [
            'as' => 'admin.ingamemanage.gm',
            'uses' => 'App\Http\Controllers\Admin\ManageController@getGM'
        ]);

        Route::post('gm', [
            'as' => 'admin.ingamemanage.postGM',
            'uses' => 'App\Http\Controllers\Admin\ManageController@postGM'
        ]);

        Route::get('gm/edit/{user}', [
            'as' => 'admin.management.gm.edit',
            'uses' => 'App\Http\Controllers\Admin\ManageController@getGMEdit'
        ]);

        Route::post('gm/edit/{user}', [
            'as' => 'admin.management.gm.postGMEdit',
            'uses' => 'App\Http\Controllers\Admin\ManageController@postGMEdit'
        ]);

        Route::get('gm/revoke/{user}', [
            'as' => 'admin.management.gm.revoke',
            'uses' => 'App\Http\Controllers\Admin\ManageController@getGMRemove'
        ]);
    });

    Route::group(['prefix' => 'chat'], static function () {
        Route::get('watch', [
            'as' => 'admin.chat.watch',
            'uses' => 'App\Http\Controllers\Admin\ChatController@getChat'
        ]);
        Route::get('config', [
            'as' => 'admin.chat.settings',
            'uses' => 'App\Http\Controllers\Admin\ChatController@getSettings'
        ]);

        Route::post('postConfig', [
            'as' => 'admin.chat.postSettings',
            'uses' => 'App\Http\Controllers\Admin\ChatController@postChatConfig'
        ]);

        Route::post('postlogs', [
            'as' => 'admin.chat.postLogs',
            'uses' => 'App\Http\Controllers\Admin\ChatController@postChatLogs'
        ]);

        if (config('app.debug') === true) {
            Route::get('getlogs', [
                'as' => 'admin.chat.getLogs',
                'uses' => 'App\Http\Controllers\Admin\ChatController@postChatLogs'
            ]);
        }
    });
});

/* GM Page */
Route::group(['prefix' => 'gm', 'middleware' => ['auth', 'web', 'verified', 'gm']], static function () {
    Route::get('/', static function () {
        return view('gm.dashboard');
    })->name('gm.dashboard');

    Route::group(['prefix' => 'article', 'middleware' => 'news'], static function () {
        Route::post('upload', [
            'as' => 'gm.article.upload',
            'uses' => 'App\Http\Controllers\Admin\NewsController@upload'
        ])->withoutMiddleware([VerifyCsrfToken::class]);
    });
    Route::resource('article', ArticleController::class)->middleware('news');
    Route::resource('players', PlayersController::class);

});

/* Fortify Route */
Route::group(['middleware' => config('fortify.middleware', ['web'])], static function () {
    $enableViews = config('fortify.views', true);

    // Authentication...
    if ($enableViews) {
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])
            ->middleware(['guest:' . config('fortify.guard')])
            ->name('login');
    }

    $limiter = config('fortify.limiters.login');
    $twoFactorLimiter = config('fortify.limiters.two-factor');
    $verificationLimiter = config('fortify.limiters.verification', '6,1');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:' . config('fortify.guard'),
            $limiter ? 'throttle:' . $limiter : null,
        ]));

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // Password Reset...
    if (Features::enabled(Features::resetPasswords())) {
        if ($enableViews) {
            Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware(['guest:' . config('fortify.guard')])
                ->name('password.request');

            Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware(['guest:' . config('fortify.guard')])
                ->name('password.reset');
        }

        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
            ->middleware(['guest:' . config('fortify.guard')])
            ->name('password.email');

        Route::post('/reset-password', [NewPasswordController::class, 'store'])
            ->middleware(['guest:' . config('fortify.guard')])
            ->name('password.update');
    }

    // Registration...
    if (Features::enabled(Features::registration())) {
        if ($enableViews) {
            Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware(['guest:' . config('fortify.guard')])
                ->name('register');
        }

        Route::post('/register', [RegisteredUserController::class, 'store'])
            ->middleware(['guest:' . config('fortify.guard')]);
    }

    // Email Verification...
    if (Features::enabled(Features::emailVerification())) {
        if ($enableViews) {
            Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware(['auth:' . config('fortify.guard')])
                ->name('verification.notice');
        }

        Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
            ->middleware(['auth:' . config('fortify.guard'), 'signed', 'throttle:' . $verificationLimiter])
            ->name('verification.verify');

        Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            ->middleware(['auth:' . config('fortify.guard'), 'throttle:' . $verificationLimiter])
            ->name('verification.send');
    }

    // Profile Information...
    if (Features::enabled(Features::updateProfileInformation())) {
        Route::put('/user/profile-information', [ProfileInformationController::class, 'update'])
            ->middleware(['auth:' . config('fortify.guard')])
            ->name('user-profile-information.update');
    }

    // Passwords...
    if (Features::enabled(Features::updatePasswords())) {
        Route::put('/user/password', [PasswordController::class, 'update'])
            ->middleware(['auth:' . config('fortify.guard')])
            ->name('user-password.update');
    }

    // Password Confirmation...
    if ($enableViews) {
        Route::get('/user/confirm-password', [ConfirmablePasswordController::class, 'show'])
            ->middleware(['auth:' . config('fortify.guard')])
            ->name('password.confirm');
    }

    Route::get('/user/confirmed-password-status', [ConfirmedPasswordStatusController::class, 'show'])
        ->middleware(['auth:' . config('fortify.guard')])
        ->name('password.confirmation');

    Route::post('/user/confirm-password', [ConfirmablePasswordController::class, 'store'])
        ->middleware(['auth:' . config('fortify.guard')]);

    // Two Factor Authentication...
    if (Features::enabled(Features::twoFactorAuthentication())) {
        if ($enableViews) {
            Route::get('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'create'])
                ->middleware(['guest:' . config('fortify.guard')])
                ->name('two-factor.login');
        }

        Route::post('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'store'])
            ->middleware(array_filter([
                'guest:' . config('fortify.guard'),
                $twoFactorLimiter ? 'throttle:' . $twoFactorLimiter : null,
            ]));

        $twoFactorMiddleware = Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword')
            ? ['auth:' . config('fortify.guard'), 'password.confirm']
            : ['auth:' . config('fortify.guard')];

        Route::post('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'store'])
            ->middleware($twoFactorMiddleware)
            ->name('two-factor.enable');

        Route::delete('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'destroy'])
            ->middleware($twoFactorMiddleware)
            ->name('two-factor.disable');

        Route::get('/user/two-factor-qr-code', [TwoFactorQrCodeController::class, 'show'])
            ->middleware($twoFactorMiddleware)
            ->name('two-factor.qr-code');

        Route::get('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'index'])
            ->middleware($twoFactorMiddleware)
            ->name('two-factor.recovery-codes');

        Route::post('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'store'])
            ->middleware($twoFactorMiddleware);
    }
});

/* Jetstream Route */
Route::group(['middleware' => config('jetstream.middleware', ['web'])], static function () {
    if (Jetstream::hasTermsAndPrivacyPolicyFeature()) {
        Route::get('/terms-of-service', [TermsOfServiceController::class, 'show'])->name('terms.show');
        Route::get('/privacy-policy', [PrivacyPolicyController::class, 'show'])->name('policy.show');
    }

    Route::group(['middleware' => ['auth', 'verified']], static function () {
        // User & Profile...
        Route::get('/user/profile', [UserProfileController::class, 'show'])
            ->name('profile.show');

        // API...
        if (Jetstream::hasApiFeatures()) {
            Route::get('/user/api-tokens', [ApiTokenController::class, 'index'])->name('api-tokens.index');
        }

        // Teams...
        if (Jetstream::hasTeamFeatures()) {
            Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
            Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
            Route::put('/current-team', [CurrentTeamController::class, 'update'])->name('current-team.update');

            Route::get('/team-invitations/{invitation}', [TeamInvitationController::class, 'accept'])
                ->middleware(['signed'])
                ->name('team-invitations.accept');
        }
    });
});

