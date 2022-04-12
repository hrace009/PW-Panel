<?php


/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\Providers;

use App\Actions\Fortify\ConfirmPassword;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\PasswordValidationRules;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Helper\RandomStringGenerator;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Features;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    use PasswordValidationRules;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::ignoreRoutes();
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::confirmPasswordsUsing(static function ($user, string $password) {
            return Hash::check($user->name . $password, $user->passwd);
        });

        Fortify::authenticateUsing(function (Request $request) {
            $this->validateLogin($request);
            $user = User::where('name', $request->name)->first();
            if (Features::enabled(Features::twoFactorAuthentication())) {
                if ($user &&
                    Hash::check($request->name . $request->password, $user->passwd)
                ) {
                    return $user;
                }
            } else {
                if ($user &&
                    Hash::check($request->name . $request->password, $user->passwd) &&
                    $user->qq === $request->pin
                ) {
                    return $user;
                }
            }
        });

        Fortify::resetPasswordView(static function ($request) {
            if (Features::enabled(Features::twoFactorAuthentication())) {
                $RandPass = RandomStringGenerator::getRandomAlphaNum(6);
                return view('auth.reset-password', [
                    'request' => $request,
                    'password' => $RandPass,
                ]);
            } else {
                $RandPass = RandomStringGenerator::getRandomAlphaNum(6);
                $RandPin = RandomStringGenerator::getRandomNum(6);
                return view('auth.reset-password', [
                    'request' => $request,
                    'password' => $RandPass,
                    'pin' => $RandPin
                ]);
            }
        });

        RateLimiter::for('login', function (Request $request) {
            $email = (string)$request->email;

            return Limit::perMinute(5)->by($email . $request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }

    /**
     * @param Request $request
     */
    protected function validateLogin(Request $request): void
    {
        if (Features::enabled(Features::twoFactorAuthentication())) {
            $request->validate([
                'name' => $this->LoginPageUserNameRules(),
                'password' => $this->LoginPagePasswordRules(),
                'captcha' => $this->captchaRules(),
            ]);
        } else {
            $request->validate([
                'name' => $this->LoginPageUserNameRules(),
                'password' => $this->LoginPagePasswordRules(),
                'pin' => $this->LoginPagePinRules(),
                'captcha' => $this->captchaRules(),
            ]);
        }
    }
}
