<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Helper\TimeMaker;
use App\Models\Faction;
use App\Models\Player;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function getIndex()
    {
        return redirect()->route('app.ranking.player', 'level');
    }

    public function getPlayers(Request $request)
    {
        $ranks = Player::subtype($request->segment(4))->paginate();
        $players = new Player();
        $timeMaker = new TimeMaker();
        return view('front.ranking.players', [
            'ranks' => $ranks,
            'players' => $players,
            'timeMaker' => $timeMaker
        ]);
    }

    public function getFactions(Request $request)
    {
        $ranks = Faction::subtype($request->segment(4))->paginate();
        return view('front.ranking.factions', [
            'ranks' => $ranks
        ]);
    }
}
