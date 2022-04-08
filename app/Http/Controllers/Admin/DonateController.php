<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class DonateController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function showPaymentwall()
    {
        return view('admin.donate.paymentwall');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function postPaymentwall(Request $request): RedirectResponse
    {
        if ($request->has('status')) {
            Config::write('pw-config.payment.paymentwall.status', true);
        } else {
            Config::write('pw-config.payment.paymentwall.status', false);
        }

        if (config('pw-config.payment.paymentwall.status') === true) {
            $configs = $request->validate([
                'widget_code' => 'string',
                'widget_width' => 'string',
                'widget_high' => 'string',
                'project_key' => 'string',
                'secret_key' => 'string'
            ]);
            foreach ($configs as $config => $value) {
                if (!$value) {
                    Config::write('pw-config.payment.paymentwall.' . $config, '');
                }
                Config::write('pw-config.payment.paymentwall.' . $config, $value);
            }
        }
        return redirect()->back()->with('success', __('admin.configSaved'));
    }

    /**
     * @return Application|Factory|View
     */
    public function showBank()
    {
        return view('admin.donate.banktransfer');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function postBank(Request $request): RedirectResponse
    {
        if ($request->has('status')) {
            Config::write('pw-config.payment.bank_transfer.status', true);
        } else {
            Config::write('pw-config.payment.bank_transfer.status', false);
        }

        if ($request->has('double')) {
            Config::write('pw-config.payment.bank_transfer.double', true);
        } else {
            Config::write('pw-config.payment.bank_transfer.double', false);
        }

        if (config('pw-config.payment.bank_transfer.status') === true) {

            $configs = $request->validate([
                'accountOwner' => 'required|string',
                'bankName1' => 'string|nullable',
                'bankName2' => 'string|nullable',
                'bankName3' => 'string|nullable',
                'bankAccountNo1' => 'numeric|nullable',
                'bankAccountNo2' => 'numeric|nullable',
                'bankAccountNo3' => 'numeric|nullable',
                'multiply' => 'required|numeric',
                'limit' => 'required|numeric',
                'CurrencySign' => 'required|string',
                'payment_price' => 'required|numeric'
            ]);

            foreach ($configs as $config => $value) {
                if (!$value) {
                    Config::write('pw-config.payment.bank_transfer.' . $config, '');
                } else {
                    Config::write('pw-config.payment.bank_transfer.' . $config, $value);
                }
            }
        }
        return redirect()->back()->with('success', __('admin.configSaved'));
    }
}
