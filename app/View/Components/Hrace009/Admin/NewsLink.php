<?php

namespace App\View\Components\Hrace009\Admin;

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
        if (request()->routeIs('admin.createNews')) {
            $status = 'true';
            $createNewsText = '700';
            $CreateNewsLight = 'text-light';
            $viewNewsText = '400';
            $viewNewsLight = 'text-gray-400';
            $settingsNewsText = '400';
            $settingsNewsLight = 'text-gray-400';
        } elseif (request()->routeIs('admin.viewNews')) {
            $status = 'true';
            $createNewsText = '400';
            $CreateNewsLight = 'text-gray-400';
            $viewNewsText = '700';
            $viewNewsLight = 'text-light';
            $settingsNewsText = '400';
            $settingsNewsLight = 'text-gray-400';
        } elseif (request()->routeIs('admin.settingsNews')) {
            $status = 'true';
            $createNewsText = '400';
            $CreateNewsLight = 'text-gray-400';
            $viewNewsText = '400';
            $viewNewsLight = 'text-gray-400';
            $settingsNewsText = '700';
            $settingsNewsLight = 'text-light';
        } else {
            $status = 'false';
            $createNewsText = '400';
            $CreateNewsLight = 'text-gray-400';
            $viewNewsText = '400';
            $viewNewsLight = 'text-gray-400';
            $settingsNewsText = '400';
            $settingsNewsLight = 'text-gray-400';
        }
        return view('components.hrace009.admin.news-link', [
            'status' => $status,
            'createText' => $createNewsText,
            'createLight' => $CreateNewsLight,
            'viewText' => $viewNewsText,
            'viewLight' => $viewNewsLight,
            'settingsText' => $settingsNewsText,
            'settingsLight' => $settingsNewsLight,
        ]);
    }
}
