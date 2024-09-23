<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BankLog;
use App\Models\User;
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
     * @return Application|Factory|View
     */
    public function showConfirm()
    {
        $logs = BankLog::paginate();
        $user = new User();
        return view('admin.donate.bankconfirm', [
            'logs' => $logs,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified transfer history.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function updateBankLog(Request $request, int $id): RedirectResponse
    {
        $input = $this->validate($request, [
            'status' => 'required|string',
            'reason' => 'required|string',
        ]);


        $BankLog = BankLog::whereId($id);
        $data = $BankLog->get(['amount', 'gameID'])->firstOrFail();
        $user = User::whereId($data->gameID)->firstOrFail();
        $amount = $data->amount;
        if (config('pw-config.payment.bank_transfer.double')) {
            $amount *= 2;
        }

        $BankLog->update([
            'status' => $input['status'],
            'reason' => $input['reason'],
        ]);

        if ($input['status'] === 'accept') {
            $user->update([
                'money' => $user->money += $amount,
            ]);
        }
        return redirect()->back()->with('success', __('donate.history.success'));
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

    public function showPaypal()
    {
        return view('admin.donate.paypal');
    }

    public function postPaypal(Request $request)
    {
        if ($request->has('status')) {
            Config::write('pw-config.payment.paypal.status', true);
        } else {
            Config::write('pw-config.payment.paypal.status', false);
        }

        if ($request->has('sandbox')) {
            Config::write('pw-config.payment.paypal.sandbox', true);
        } else {
            Config::write('pw-config.payment.paypal.sandbox', false);
        }

        if ($request->has('double')) {
            Config::write('pw-config.payment.paypal.double', true);
        } else {
            Config::write('pw-config.payment.paypal.double', false);
        }

        if (config('pw-config.payment.paypal.status') === true) {
            $configs = $request->validate([
                'client_id' => 'required|string',
                'secret' => 'required|string',
                'currency' => 'required|string',
                'currency_per' => 'required|numeric',
                'minimum' => 'required|numeric',
                'maximum' => 'required|numeric',
                'mingetbonus' => 'required|numeric',
                'bonusess' => 'required|numeric'
            ]);

            foreach ($configs as $config => $value) {
                if (!$value) {
                    Config::write('pw-config.payment.paypal.' . $config, '');
                } else {
                    Config::write('pw-config.payment.paypal.' . $config, $value);
                }
            }
        }
        return redirect()->back()->with('success', __('admin.configSaved'));
    }

    public function showIpaymu()
    {
        return view('admin.donate.ipaymu');
    }

    public function postIpaymu(Request $request)
    {
        if ($request->has('status')) {
            Config::write('ipaymu.status', true);
        } else {
            Config::write('ipaymu.status', false);
        }

        if ($request->has('sandbox')) {
            Config::write('ipaymu.sandbox', true);
        } else {
            Config::write('ipaymu.sandbox', false);
        }

        if ($request->has('double')) {
            Config::write('ipaymu.double', true);
        } else {
            Config::write('ipaymu.double', false);
        }

        if (config('ipaymu.status') === true) {
            $configs = $request->validate([
                'va' => 'required|string',
                'key' => 'required|string',
                'currency_per' => 'required|numeric',
                'minimum' => 'required|numeric',
                'maximum' => 'required|numeric',
                'refid' => 'required|string',
                'bonusess' => 'required|numeric|max:100',
                'mingetbonus' => 'required|numeric',
                'route' => 'required|string|min:6|max:30',
            ]);
            if ($configs['maximum'] < $configs['minimum']) {
                return redirect()->back()->with('error', __('donate.ipaymu.error.smalmax'));
            } else {
                foreach ($configs as $config => $value) {
                    if (!$value) {
                        Config::write('ipaymu.' . $config, '');
                    } else {
                        Config::write('ipaymu.' . $config, $value);
                    }
                }
            }
        }

        return redirect()->back()->with('success', __('admin.configSaved'));
    }

    public function getHistory()
    {
        //TODO: create list income
        $banks = BankLog::whereStatus('accept')->paginate();
        return view ('admin.donate.history', [
            'banks' => $banks
        ]);
    }
}
