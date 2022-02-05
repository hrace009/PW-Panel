<?php


/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the user's password.
     *
     * @param mixed $user
     * @param array $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'current_password' => ['required', 'string'],
            'password' => $this->UpdateUserPasswordPasswordPage(),
        ])->after(function ($validator) use ($user, $input) {
            if (!isset($input['current_password']) || !Hash::check($user->name . $input['current_password'], $user->passwd)) {
                $validator->errors()->add('current_password', __('The provided password does not match your current password.'));
            }
        })->validateWithBag('updatePassword');

        $user->forceFill([
            'passwd' => Hash::make($user->name . $input['password']),
            'passwd2' => Hash::make($user->name . $input['password']),
            'answer' => $input['password'],
        ])->save();
    }
}
