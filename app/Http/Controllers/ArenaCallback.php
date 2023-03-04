<?php

namespace App\Http\Controllers;

use App\Models\ArenaLogs;
use App\Models\Transfer;
use App\Models\User;
use Illuminate\Http\Request;

class ArenaCallback extends Controller
{
    public function incentive(Request $request)
    {
        $request->validate([
            'voted' => 'integer|required',
            'userip' => 'ip|required',
            'userid' => 'integer|required',
            'logid' => 'integer|required'
        ]);
        $valid = $request->get('voted');
        $userip = $request->get('userip');
        $userid = $request->get('userid');
        $logid = $request->get('logid');
        $custom = $request->get('custom');

        if ($userid && $valid == 1) {
            $logs = ArenaLogs::current($request, $userid, $logid, $valid);
            $reward = $logs->get()->count();

            if ($reward) {
                $user = User::whereId($userid)->first();
                $logs->update([
                    'status' => 0,
                    'ip_address' => $userip
                ]);

                switch (config('arena.reward_type')) {
                    case 'bonusess':
                        $user->bonuses = $user->bonuses + config('arena.reward');
                        $user->save();
                        break;
                    case 'virtual':
                        $user->money = $user->money + config('arena.reward');
                        $user->save();
                        break;
                    case 'cubi':
                        Transfer::create([
                            'user_id' => $userid,
                            'zone_id' => 1,
                            'cash' => config('arena.reward')
                        ]);
                        break;
                }
                $result = 'OK';
            } else {
                $result = 'No record found';
            }
        } else {
            $result = 'Already Voted';
        }
        return $result;
    }
}
