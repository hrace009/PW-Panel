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

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Laravel\Fortify\Features;

class ResetPasswordPinMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var
     */
    public $pwusers;

    /**
     * @param $pwusers
     */
    public function __construct($pwusers)
    {
        $this->pwusers = $pwusers;
    }

    /**
     * @return ResetPasswordPinMail
     */
    public function build(): ResetPasswordPinMail
    {
        $pwusers = (object)$this->pwusers;
        if (Features::enabled(Features::twoFactorAuthentication())) {
            return $this->subject(__('auth.email.subject') . ' ' . $pwusers->fullname)
                ->markdown('emails.reset-password-pin')
                ->with([
                    'login' => $pwusers->login,
                    'password' => $pwusers->password,
                    'email' => $pwusers->email,
                    'fullname' => $pwusers->fullname
                ]);
        } else {
            return $this->subject(__('auth.email.subject') . ' ' . $pwusers->fullname)
                ->markdown('emails.reset-password-pin')
                ->with([
                    'login' => $pwusers->login,
                    'password' => $pwusers->password,
                    'email' => $pwusers->email,
                    'pin' => $pwusers->pin,
                    'fullname' => $pwusers->fullname
                ]);
        }
    }
}
