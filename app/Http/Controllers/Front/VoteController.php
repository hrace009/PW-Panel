<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Transfer;
use App\Models\Vote;
use App\Models\VoteLogs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function getIndex(Request $request)
    {
        $vote_info = [];
        $votes = Vote::all();

        foreach ($votes as $vote) {
            $log = VoteLogs::onCooldown($request, $vote->id);

            if ($log->exists()) {
                $log = $log->first();
                if (time() < ($log->created_at->getTimestamp() + (3600 * $vote->hour_limit))) {
                    $vote_info[$vote->id]['end_time'] = $log->created_at->addHours($vote->hour_limit)->getTimestamp() - Carbon::now()->getTimestamp();
                    $vote_info[$vote->id]['status'] = FALSE;
                } else {
                    $vote_info[$vote->id]['status'] = TRUE;
                }
            } else {
                $vote_info[$vote->id]['status'] = TRUE;
            }
        }

        return view('front.vote.index', [
            'votes' => $votes,
            'vote_info' => $vote_info
        ]);
    }

    public function getSuccess(Vote $vote)
    {
        return view('front.vote.success', [
            'vote' => $vote,
        ]);
    }

    public function postCheck(Request $request, Vote $vote)
    {
        if (!VoteLogs::recent($request, $vote)->exists()) {
            switch ($vote->type) {
                case 'virtual':
                    $user = Auth::user();
                    $user->money = $vote->reward_amount + $user->money;
                    $user->save();
                    break;
                case 'cubi':
                    Transfer::create([
                        'user_id' => Auth::user()->ID,
                        'zone_id' => 1,
                        'cash' => $vote->reward_amount
                    ]);
                    break;
            }
            VoteLogs::create([
                'user_id' => Auth::user()->ID,
                'ip_address' => $request->ip(),
                'reward' => $vote->reward_amount,
                'site_id' => $vote->id
            ]);
            return redirect()->route('app.vote.success', $vote->id);
        } else {
            return redirect()->back()->with('error', __('vote.already_voted'));
        }
    }
}
