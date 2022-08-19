<?php


namespace App\View\Components\Hrace009\Front;

use Illuminate\View\Component;

class RankingLink extends Component
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
        if (request()->routeIs('app.ranking.player')) {
            $status = 'true';
            $PlayerText = '700';
            $PlayerLight = 'text-light';
            $FactionText = '400';
            $FactionLight = 'text-gray-400';
        } elseif (request()->routeIs('app.ranking.faction')) {
            $status = 'true';
            $PlayerText = '400';
            $PlayerLight = 'text-gray-400';
            $FactionText = '700';
            $FactionLight = 'text-light';
        } else {
            $status = 'false';
            $PlayerText = '400';
            $PlayerLight = 'text-gray-400';
            $FactionText = '400';
            $FactionLight = 'text-gray-400';
        }
        return view('components.hrace009.front.ranking-link', [
            'status' => $status,
            'PlayerText' => $PlayerText,
            'PlayerLight' => $PlayerLight,
            'FactionText' => $FactionText,
            'FactionLight' => $FactionLight
        ]);
    }
}
