<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BankTransfer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var
     */
    public $bank;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bank)
    {
        $this->bank = $bank;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        $bank = (object)$this->bank;
        return
            $this->subject(__('donate.guide.bank.email.subject', ['bank' => strtoupper(config('pw-config.payment.bank_transfer.' . $bank->bankname)), 'name' => $bank->fullname]))
                ->markdown('emails.bank-transfer')
                ->with([
                    'fullname' => $bank->fullname,
                    'banknum' => $bank->banknum,
                    'loginid' => $bank->loginid,
                    'email' => $bank->email,
                    'phone' => $bank->phone,
                    'type' => __('donate.guide.bank.form.' . $bank->type),
                    'bankname' => strtoupper(config('pw-config.payment.bank_transfer.' . $bank->bankname)),
                    'amount' => config('pw-config.payment.bank_transfer.CurrencySign') . number_format($bank->amount * config('pw-config.payment.bank_transfer.payment_price'), 0, '.', '.') . ' (' . number_format(($bank->amount), 0, '.', '.') . ' ' . config('pw-config.currency_name') . ')',
                ]);
    }
}
