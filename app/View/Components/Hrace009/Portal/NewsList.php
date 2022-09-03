<?php

namespace App\View\Components\Hrace009\Portal;

use App\Models\News;
use App\Models\User;
use Illuminate\View\Component;

class NewsList extends Component
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
        return view('components.hrace009.portal.news-list', [
            'news' => News::orderBy('id', 'desc')->paginate(3),
            'user' => new User(),
        ]);
    }
}
