<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ArenaLogs;
use App\Models\Transfer;
use App\Models\VoteLog;
use App\Models\VoteSite;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function getIndex(Request $request)
    {
        $vote_info = [];
        $sites = VoteSite::all();

        foreach ($sites as $site) {
            $log = VoteLog::onCooldown($request, $site->id);

            if ($log->exists()) {
                $log = $log->first();
                if (time() < ($log->created_at->getTimestamp() + (3600 * $site->hour_limit))) {
                    $vote_info[$site->id]['end_time'] = $log->created_at->addHours($site->hour_limit)->getTimestamp() - Carbon::now()->getTimestamp();
                    $vote_info[$site->id]['status'] = FALSE;
                } else {
                    $vote_info[$site->id]['status'] = TRUE;
                }
            } else {
                $vote_info[$site->id]['status'] = TRUE;
            }
        }

        $arena_info = [];
        $arena_log = ArenaLogs::onCooldown($request, Auth::user()->ID);
        if ($arena_log->exists()) {
            $arena_log = $arena_log->first();
            if (time() < $arena_log->created_at->getTimestamp() + (3600 * config('arena.time'))) {
                $arena_info[Auth::user()->ID]['end_time'] = $arena_log->created_at->addHours(config('arena.time'))->getTimestamp() - Carbon::now()->getTimestamp();
                $arena_info[Auth::user()->ID]['status'] = FALSE;
            } else {
                $arena_info[Auth::user()->ID]['status'] = TRUE;
            }
        } else {
            $arena_info[Auth::user()->ID]['status'] = TRUE;
        }

        return view('front.vote.index', [
            'sites' => $sites,
            'vote_info' => $vote_info,
            'arena' => new ArenaLogs(),
            'arena_info' => $arena_info
        ]);
    }

    public function getSuccess(VoteSite $site)
    {
        return view('front.vote.success', [
            'site' => $site,
        ]);
    }

    public function postCheck(VoteSite $site)
    {
        return redirect()->route('app.vote.success', $site->id);
    }

    public function postSubmit(Request $request, VoteSite $site)
    {
        if (!VoteLog::recent($request, $site)->exists()) {
            switch ($site->type) {
                case 'virtual':
                    $user = Auth::user();
                    $user->money = $site->reward_amount + $user->money;
                    $user->save();
                    break;

                case 'cubi':
                    Transfer::create([
                        'user_id' => Auth::user()->ID,
                        'zone_id' => 1,
                        'cash' => $site->reward_amount
                    ]);
                    break;
            }
            VoteLog::create([
                'user_id' => Auth::user()->ID,
                'ip_address' => $request->ip(),
                'reward' => $site->reward_amount,
                'site_id' => $site->id
            ]);
            return redirect()->to($site->link);
        } else {
            return redirect()->route('app.vote.index')->with('error', __('vote.already_voted', ['site' => $site->name]));
        }
    }

    public function arenaSubmit(Request $request)
    {
        if (!ArenaLogs::recent($request, Auth::user()->ID)->exists()) {
            ArenaLogs::create([
                'user_id' => Auth::user()->ID,
                'ip_address' => $request->ip(),
                'reward' => config('arena.reward')
            ]);
            $recent = ArenaLogs::recent($request, Auth::user()->ID)->first();
            $callback_url = urlencode(base64_encode(route('api.arenatop100') . '?userid=' . Auth::user()->ID . '&logid=' . $recent->id));
            return redirect()->to('https://www.arena-top100.com/index.php?a=in&u=' . config('arena.username') . '&callback=' . $callback_url);
        } else {
            return redirect()->route('app.vote.index')->with('error', __('vote.already_voted', ['site' => 'Arena Top 100']));
        }
    }
}
