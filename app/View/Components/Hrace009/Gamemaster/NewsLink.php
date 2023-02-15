<?php

namespace App\View\Components\Hrace009\Gamemaster;

use Illuminate\View\Component;

class NewsLink extends Component
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
        if (request()->routeIs('article.create')) {
            $status = 'true';
            $createNewsText = '700';
            $CreateNewsLight = 'text-light';
            $viewNewsText = '400';
            $viewNewsLight = 'text-gray-400';
        } elseif (request()->routeIs('article.index')) {
            $status = 'true';
            $createNewsText = '400';
            $CreateNewsLight = 'text-gray-400';
            $viewNewsText = '700';
            $viewNewsLight = 'text-light';
        } elseif (request()->routeIs('article.edit')) {
            $status = 'true';
            $createNewsText = '400';
            $CreateNewsLight = 'text-gray-400';
            $viewNewsText = '400';
            $viewNewsLight = 'text-gray-400';
        } else {
            $status = 'false';
            $createNewsText = '400';
            $CreateNewsLight = 'text-gray-400';
            $viewNewsText = '400';
            $viewNewsLight = 'text-gray-400';
        }
        return view('components.hrace009.gamemaster.news-link', [
            'status' => $status,
            'createText' => $createNewsText,
            'createLight' => $CreateNewsLight,
            'viewText' => $viewNewsText,
            'viewLight' => $viewNewsLight,
        ]);
    }
}
