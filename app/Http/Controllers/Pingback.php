<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Controllers;

use App\Models\IpaymuLog;
use App\Models\Paymentwall;
use App\Models\User;
use Illuminate\Http\Request;
use Paymentwall_Config;
use Paymentwall_Pingback;

class Pingback extends Controller
{
    public function updateMoney($ID, $amount): void
    {
        $user = User::whereId($ID)->firstOrFail();
        $user->update([
            'money' => $user->money += $amount
        ]);
    }

    public function createLog($id, $amount, $refid, $type): void
    {
        Paymentwall::create([
            'userID' => $id,
            'amount' => $amount,
            'refid' => $refid,
            'type' => $type
        ]);
    }

    public function paymentwall()
    {
        Paymentwall_Config::getInstance()->set([
            'api_type' => Paymentwall_Config::API_VC,
            'public_key' => config('pw-config.payment.paymentwall.project_key'),
            'private_key' => config('pw-config.payment.paymentwall.secret_key')
        ]);

        $pingback = new Paymentwall_Pingback($_GET, $_SERVER['REMOTE_ADDR']);

        if ($pingback->validate()) {
            $userID = $pingback->getUserId();
            $amount = $pingback->getVirtualCurrencyAmount();
            $refID = $pingback->getReferenceId();
            $type = $pingback->getType();

            // Payment success
            if ($type === 0) {
                $this->updateMoney($userID, $amount);
            }

            // Send by costumer service
            if ($type === 1) {
                $this->updateMoney($userID, $amount);
            }

            // Payment failed
            if ($type === 2) {
                $this->updateMoney($userID, $amount);
            }
            $this->createLog($userID, $amount, $refID, $type);
            return 'OK';
        } else {
            return $pingback->getErrorSummary();
        }
    }

    public function IpaymuCallback(Request $request)
    {
        $trx_id = $request->get('trx_id');
        $status = $request->get('status');
        $status_code = $request->get('status_code');
        $sid = $request->get('sid');
        $reference_id = $request->get('reference_id');

        $check = IpaymuLog::whereSid($sid)->whereStatus('pending')->whereStatusCode('0')->firstOrFail();
        if (!$check) {
            $message = 'failed';
        } else {
            $update = IpaymuLog::whereSid($sid);
            $update->update([
                'trx_id' => $trx_id,
            ]);
            if ($status == 'berhasil' && $status_code == '1') {
                $update->update([
                    'trx_id' => $trx_id,
                    'status' => 'berhasil',
                    'status_code' => '1'
                ]);
                $user = $update->firstOrFail();
                if (!config('ipaymu.double')) {
                    $this->updateMoney($user->user_id, $user->amount);
                } else {
                    $this->updateMoney($user->user_id, $user->amount * 2);
                }
                $message = 'success';
            } else {
                $message = 'success update trx id';
            }
        }

        return $message;
    }
}
