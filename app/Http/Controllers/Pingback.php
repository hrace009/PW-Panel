<?php

namespace App\Http\Controllers;

use App\Models\Paymentwall;
use App\Models\User;
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
}
