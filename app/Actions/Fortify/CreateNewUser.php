<?php


/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\Actions\Fortify;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Features;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return User
     */
    public function create(array $input)
    {
        if (Features::enabled(Features::twoFactorAuthentication())) {
            if (config('pw-config.system.apps.captcha')) {
                Validator::make($input, [
                    'name' => $this->RegisterPageUserNameRules(),
                    'email' => $this->RegisterPageEmailRules(),
                    'password' => $this->RegisterPagePasswordRules(),
                    'truename' => $this->RegisterPageFullNameRules(),
                    'captcha' => $this->captchaRules(),
                    'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
                ])->validate();
            } else {
                Validator::make($input, [
                    'name' => $this->RegisterPageUserNameRules(),
                    'email' => $this->RegisterPageEmailRules(),
                    'password' => $this->RegisterPagePasswordRules(),
                    'truename' => $this->RegisterPageFullNameRules(),
                    'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
                ])->validate();
            }


            return User::create([
                'ID' => (User::all()->count() > 0) ? User::orderBy('ID', 'desc')->first()->ID + 16 : 1024,
                'name' => $input['name'],
                'email' => $input['email'],
                'passwd' => Hash::make($input['name'] . $input['password']),
                'passwd2' => Hash::make($input['name'] . $input['password']),
                'answer' => config('app.debug') ? $input['password'] : '',
                'truename' => ucwords($input['truename']),
                'creatime' => Carbon::now(),
            ]);
        } else {
            if (config('pw-config.system.apps.captcha')) {
                Validator::make($input, [
                    'name' => $this->RegisterPageUserNameRules(),
                    'email' => $this->RegisterPageEmailRules(),
                    'password' => $this->RegisterPagePasswordRules(),
                    'pin' => $this->RegisterPagePinRules(),
                    'truename' => $this->RegisterPageFullNameRules(),
                    'captcha' => $this->captchaRules(),
                    'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
                ])->validate();
            } else {
                Validator::make($input, [
                    'name' => $this->RegisterPageUserNameRules(),
                    'email' => $this->RegisterPageEmailRules(),
                    'password' => $this->RegisterPagePasswordRules(),
                    'pin' => $this->RegisterPagePinRules(),
                    'truename' => $this->RegisterPageFullNameRules(),
                    'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
                ])->validate();
            }
            return User::create([
                'ID' => (User::all()->count() > 0) ? User::orderBy('ID', 'desc')->first()->ID + 16 : 1024,
                'name' => $input['name'],
                'email' => $input['email'],
                'passwd' => Hash::make($input['name'] . $input['password']),
                'passwd2' => Hash::make($input['name'] . $input['password']),
                'answer' => config('app.debug') ? $input['password'] : '',
                'qq' => $input['pin'],
                'truename' => ucwords($input['truename']),
                'creatime' => Carbon::now(),
            ]);
        }
    }
}
