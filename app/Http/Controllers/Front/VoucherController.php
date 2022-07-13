<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use App\Models\VoucherLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoucherController extends Controller
{

    public function getIndex()
    {
        $voucher_logs = Auth::user()->voucher_logs()->paginate(15);
        return view('front.voucher.index', [
            'voucher_logs' => $voucher_logs,
        ]);
    }

    public function postRedem(Request $request)
    {
        $voucher = Voucher::whereCode($request->code)->first();
        $user = Auth::user();

        if ($voucher) {
            if (!VoucherLog::redeemed($voucher->id, $request)->exists()) {
                VoucherLog::create([
                    'voucher_id' => $voucher->id,
                    'user_id' => Auth::user()->ID,
                    'ip_address' => $request->ip()
                ]);
                $voucher->times_redeemed = $voucher->times_redeemed + 1;
                $voucher->save();

                $user->money = $user->money + $voucher->amount;
                $user->save();

                $status = 'success';
                $message = __('voucher.successfully_redeemed');
            } else {
                $status = 'error';
                $message = __('voucher.already_redeemed');
            }
        } else {
            $status = 'error';
            $message = __('voucher.code_not_found');
        }
        return redirect()->back()->with($status, $message);
    }
}
