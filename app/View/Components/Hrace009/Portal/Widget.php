<?php

namespace App\View\Components\Hrace009\Portal;

use App\Models\Point;
use App\Models\User;
use hrace009\PerfectWorldAPI\API;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Widget extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $gms = [];
        foreach (DB::table('auth')->select('userid')->distinct()->get() as $gm) {
            $gms[] = User::find($gm->userid);
        }
        $point = new Point();
        $api = new API();
        return view('components.hrace009.portal.widget', [
            'gms' => $gms,
            'totalUser' => User::count('name'),
            'onlinePlayer' => $point->getOnlinePlayer(),
            'api' => $api
        ]);
    }
}
