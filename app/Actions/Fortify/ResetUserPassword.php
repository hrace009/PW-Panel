<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */


/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\Actions\Fortify;

use App\Mail\ResetPasswordPinMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\ResetsUserPasswords;
use Laravel\Fortify\Features;

class ResetUserPassword implements ResetsUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and reset the user's forgotten password.
     *
     * @param mixed $user
     * @param array $input
     * @return void
     */
    public function reset($user, array $input)
    {
        if (Features::enabled(Features::twoFactorAuthentication())) {
            Validator::make($input, [
                'password' => $this->ResetPasswordPagePasswordRules(),
            ])->validate();

            $user->forceFill([
                'passwd' => Hash::make($user['name'] . $input['password']),
                'passwd2' => Hash::make($user['name'] . $input['password']),
                'answer' => config('app.debug') ? $input['password'] : '',
            ])->save();

            $pwusers = [
                'login' => $user->name,
                'password' => $input['password'],
                'email' => $user->email,
                'fullname' => $user->truename
            ];
        } else {
            Validator::make($input, [
                'password' => $this->ResetPasswordPagePasswordRules(),
                'pin' => $this->ResetPasswordPagePinRules()
            ])->validate();

            $user->forceFill([
                'passwd' => Hash::make($user['name'] . $input['password']),
                'passwd2' => Hash::make($user['name'] . $input['password']),
                'answer' => config('app.debug') ? $input['password'] : '',
                'qq' => $input['pin'],
            ])->save();

            $pwusers = [
                'login' => $user->name,
                'password' => $input['password'],
                'email' => $user->email,
                'pin' => $input['pin'],
                'fullname' => $user->truename
            ];
        }
        Mail::to($pwusers['email'])->locale($user->language)->send(new ResetPasswordPinMail($pwusers));
    }
}
