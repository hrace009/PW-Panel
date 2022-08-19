<?php

namespace App\Http\Controllers\Profile;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UpdateUserPin extends Controller
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
            'current_pin' => $this->UpdateUserPinPageCurrentPinRules(),
            'pin' => $this->UpdateUserPinPagePinConfirmRules(),
        ])->after(function ($validator) use ($user, $input) {
            if (!isset($input['current_pin']) || $user->qq !== $input['current_pin']) {
                $validator->errors()->add('current_pin', __('general.dashboard.profile.updatePin.error'));
            }
        })->validateWithBag('updatePin');

        $user->forceFill([
            'qq' => $input['pin'],
        ])->save();
    }
}
