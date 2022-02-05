<?php


/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\Actions\Fortify;

trait PasswordValidationRules
{
    /**
     * Validation for username field
     * Use at Login Page
     *
     * @return string[]
     */
    protected function LoginPageUserNameRules(): array
    {
        return ['required', 'string', 'between:4,12', 'alpha_num', 'regex:/^[a-z0-9]+$/'];
    }

    /**
     * Validation for password field
     * Use at Login Page
     *
     * @return string[]
     */
    protected function LoginPagePasswordRules(): array
    {
        return ['required', 'string', 'min:6', 'alpha_num', 'regex:/^[a-z0-9]+$/'];
    }

    /**
     * Validation for Pin field
     * Use at Login Page
     *
     * @return string[]
     */
    protected function LoginPagePinRules(): array
    {
        return ['required', 'numeric', 'digits_between:4,6', 'regex:/^[0-9]+$/'];
    }

    /**
     * Validation for Username field
     * Use at Register Page
     *
     * @return string[]
     */
    protected function RegisterPageUserNameRules(): array
    {
        return ['required', 'string', 'between:4,12', 'unique:users', 'alpha_num', 'regex:/^[a-z0-9]+$/'];
    }

    /**
     * Validation for email field
     * Use at Register Page
     *
     * @return string[]
     */
    protected function RegisterPageEmailRules(): array
    {
        return ['required', 'string', 'email', 'max:255', 'unique:users'];
    }

    /**
     * Validation for password field.
     * Use at Register Page
     *
     * @return array
     */
    protected function RegisterPagePasswordRules(): array
    {
        return ['required', 'string', 'min:6', 'alpha_num', 'regex:/^[a-z0-9]+$/', 'confirmed'];
    }

    /**
     * validation for pin field.
     * Use at Register Page
     *
     * @return string[]
     */
    protected function RegisterPagePinRules(): array
    {
        return ['required', 'numeric', 'digits_between:4,6', 'regex:/^[0-9]+$/'];
    }

    /**
     * Validation for Full Name field.
     * Use at Register Page
     *
     * @return string[]
     */
    protected function RegisterPageFullNameRules(): array
    {
        return ['required', 'string', 'regex:/^[a-zA-Z ]*$/'];
    }

    /**
     * Validation for password field.
     * Use at Reset Password Page
     *
     * @return string[]
     */
    protected function ResetPasswordPagePasswordRules(): array
    {
        return ['required', 'string', 'min:6', 'alpha_num', 'regex:/^[a-z0-9]+$/'];
    }

    /**
     * Validation for pin field.
     * Use at Reset Password Page
     *
     * @return string[]
     */
    protected function ResetPasswordPagePinRules(): array
    {
        return ['required', 'numeric', 'digits_between:4,6', 'regex:/^[0-9]+$/'];
    }

    /**
     * Validation for password field.
     * Use at Reset Update User Password Page
     *
     * @return array
     */
    protected function UpdateUserPasswordPasswordPage(): array
    {
        return ['required', 'string', 'min:6', 'alpha_num', 'regex:/^[a-z0-9]+$/', 'confirmed'];
    }

    /**
     * Validation for Full Name field.
     * Use at Update User Profile Information Page
     *
     * @return string[]
     */
    protected function UpdateUserProfileInformationPageTrueNameRules(): array
    {
        return ['required', 'string', 'regex:/^[a-zA-Z ]*$/'];
    }

    /**
     * Validation for email field.
     * Use at Update User Profile Information Page
     *
     * @return string[]
     */
    protected function UpdateUserProfileInformationPageEmailRules($option): array
    {
        return ['required', 'email', 'max:255', $option];
    }

    /**
     * Validation for email field.
     * Use at New Password Page
     *
     * @return string[]
     */
    protected function NewPasswordPageEmailRules(): array
    {
        return ['string', 'email', 'max:255'];
    }

    /**
     * Validation for password field.
     * Use at New Password Page
     *
     * @return string[]
     */
    protected function NewPasswordPagePasswordRules(): array
    {
        return ['required', 'string', 'min:6', 'alpha_num', 'regex:/^[a-z0-9]+$/'];
    }

    /**
     * Validation for email field.
     * Use at Password Reset Link Page
     *
     * @return string[]
     */
    protected function PasswordResetLinkPageEmailRules(): array
    {
        return ['string', 'email', 'max:255'];
    }

    /**
     * Validation for pin field.
     * Use at Update user Pin Page
     *
     * @return string[]
     */
    protected function UpdateUserPinPageCurrentPinRules(): array
    {
        return ['required', 'numeric', 'digits_between:4,6', 'regex:/^[0-9]+$/'];
    }

    /**
     * Validation for pin field.
     * Use at Update user Pin Page
     *
     * @return string[]
     */
    protected function UpdateUserPinPagePinConfirmRules(): array
    {
        return ['required', 'numeric', 'digits_between:4,6', 'regex:/^[0-9]+$/', 'confirmed'];
    }

    /**
     * Validation for captcha field.
     * Use at all Page
     * @return string[]
     */
    protected function captchaRules(): array
    {
        return ['required', 'alpha_num', 'regex:/^[A-Z0-9]+$/', 'captcha'];
    }
}
