<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\BanklogRequest;
use App\Mail\BankTransfer;
use App\Models\BankLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Paymentwall_Config;
use Paymentwall_Widget;

class DonateController extends Controller
{
    public function getBankIndex()
    {
        //$getPending = BankLog::where(['loginid' => Auth::user()->name, 'status' => 'pending'])->get();
        //$getPending = BankLog::whereLoginid(Auth::user()->name)->whereStatus('pending')->count('loginid');
        return view('front.donate.bank.index');
    }

    public function postBank(BanklogRequest $request)
    {
        $input = $request->all();
        BankLog::create($input);
        $bank = [
            'fullname' => $input['fullname'],
            'banknum' => $input['banknum'],
            'loginid' => $input['loginid'],
            'gameID' => $input['gameID'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'type' => $input['type'],
            'bankname' => $input['bankname'],
            'amount' => $input['amount'],
        ];
        Mail::to(config('mail.from.address'))->locale(Auth::user()->language)->send(new BankTransfer($bank));
        return redirect(route('app.donate.bank'))->with('success', __('donate.guide.bank.form.success'));
    }

    public function getPaymentwallIndex()
    {
        Paymentwall_Config::getInstance()->set(array(
            'api_type' => Paymentwall_Config::API_VC,
            'public_key' => config('pw-config.payment.paymentwall.project_key'),
            'private_key' => config('pw-config.payment.paymentwall.secret_key')
        ));

        $userId = Auth::user()->ID;
        $userEmail = Auth::user()->email;
        $userRegDate = Auth::user()->created_at;
        $userLastUpdate = Auth::user()->last_update;
        $userName = Auth::user()->name;
        $widgetCode = config('pw-config.payment.paymentwall.widget_code');
        $products = array();
        $extraParams = array(
            'email' => $userEmail,
            'history[registration_date]' => $userRegDate,
            'customer[username]' => $userName,
            'history[membership_date]' => $userLastUpdate,
        );
        $PWWidget = new Paymentwall_Widget($userId, $widgetCode, $products, $extraParams);
        $widget = $PWWidget->getHtmlCode([
            'width' => config('pw-config.payment.paymentwall.widget_width'),
            'height' => config('pw-config.payment.paymentwall.widget_high')
        ]);
        return view('front.donate.paymenwall.index', [
            'widget' => $widget,
        ]);
    }

    public function getHistoryIndex()
    {
        $logbank = BankLog::whereLoginid(Auth::user()->name)->paginate();
        return view('front.donate.history.index', [
            'banks' => $logbank,
        ]);
    }
}
