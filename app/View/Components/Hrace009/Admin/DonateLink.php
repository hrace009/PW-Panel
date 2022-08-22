<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\View\Components\Hrace009\Admin;

use Illuminate\View\Component;

class DonateLink extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if (request()->routeIs('admin.donate.paymentwall')) {
            $status = 'true';
            $textPaymentwall = '700';
            $lightPaymentwall = 'text-light';
            $textBank = '400';
            $lightBank = 'text-gray-400';
            $textConfirm = '400';
            $lightConfirm = 'text-gray-400';
            $textPaypal = '400';
            $lightPaypal = 'text-gray-400';
            $textiPaymu = '400';
            $lightIpaymu = 'text-gray-400';
            $textHistory = '400';
            $lightHistory = 'text-gray-400';
        } elseif (request()->routeIs('admin.donate.banktransfer')) {
            $status = 'true';
            $textPaymentwall = '400';
            $lightPaymentwall = 'text-gray-400';
            $textBank = '700';
            $lightBank = 'text-light';
            $textConfirm = '400';
            $lightConfirm = 'text-gray-400';
            $textPaypal = '400';
            $lightPaypal = 'text-gray-400';
            $textiPaymu = '400';
            $lightIpaymu = 'text-gray-400';
            $textHistory = '400';
            $lightHistory = 'text-gray-400';
        } elseif (request()->routeIs('admin.donate.bankconfirm')) {
            $status = 'true';
            $textPaymentwall = '400';
            $lightPaymentwall = 'text-gray-400';
            $textBank = '400';
            $lightBank = 'text-gray-400';
            $textConfirm = '700';
            $lightConfirm = 'text-light';
            $textPaypal = '400';
            $lightPaypal = 'text-gray-400';
            $textiPaymu = '400';
            $lightIpaymu = 'text-gray-400';
            $textHistory = '400';
            $lightHistory = 'text-gray-400';
        } elseif (request()->routeIs('admin.donate.paypal')) {
            $status = 'true';
            $textPaymentwall = '400';
            $lightPaymentwall = 'text-gray-400';
            $textBank = '400';
            $lightBank = 'text-gray-400';
            $textConfirm = '400';
            $lightConfirm = 'text-gray-400';
            $textPaypal = '700';
            $lightPaypal = 'text-light';
            $textiPaymu = '400';
            $lightIpaymu = 'text-gray-400';
            $textHistory = '400';
            $lightHistory = 'text-gray-400';
        } elseif (request()->routeIs('admin.donate.ipaymu')) {
            $status = 'true';
            $textPaymentwall = '400';
            $lightPaymentwall = 'text-gray-400';
            $textBank = '400';
            $lightBank = 'text-gray-400';
            $textConfirm = '400';
            $lightConfirm = 'text-gray-400';
            $textPaypal = '400';
            $lightPaypal = 'text-gray-400';
            $textiPaymu = '700';
            $lightIpaymu = 'text-light';
            $textHistory = '400';
            $lightHistory = 'text-gray-400';
        } elseif (request()->routeIs('admin.donate.history')) {
            $status = 'true';
            $textPaymentwall = '400';
            $lightPaymentwall = 'text-gray-400';
            $textBank = '400';
            $lightBank = 'text-gray-400';
            $textConfirm = '400';
            $lightConfirm = 'text-gray-400';
            $textPaypal = '400';
            $lightPaypal = 'text-gray-400';
            $textiPaymu = '400';
            $lightIpaymu = 'text-gray-400';
            $textHistory = '700';
            $lightHistory = 'text-light';
        } else {
            $status = 'false';
            $textPaymentwall = '400';
            $lightPaymentwall = 'text-gray-400';
            $textBank = '400';
            $lightBank = 'text-gray-400';
            $textConfirm = '400';
            $lightConfirm = 'text-gray-400';
            $textPaypal = '400';
            $lightPaypal = 'text-gray-400';
            $textiPaymu = '400';
            $lightIpaymu = 'text-gray-400';
            $textHistory = '400';
            $lightHistory = 'text-gray-400';
        }

        return view('components.hrace009.admin.donate-link', [
            'status' => $status,
            'textPaymentwall' => $textPaymentwall,
            'lightPaymentwall' => $lightPaymentwall,
            'textBank' => $textBank,
            'lightBank' => $lightBank,
            'textConfirm' => $textConfirm,
            'lightConfirm' => $lightConfirm,
            'textPaypal' => $textPaypal,
            'lightPaypal' => $lightPaypal,
            'textiPaymu' => $textiPaymu,
            'lightiPaymu' => $lightIpaymu,
            'textHistory' => $textHistory,
            'lightHistory' => $lightHistory,
        ]);
    }
}
