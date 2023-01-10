<?php

namespace App\View\Components\Hrace009\Portal;

use App\Models\News;
use Illuminate\View\Component;

class Navbar extends Component
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
        return view('components.hrace009.portal.navbar', [
            'download' => News::whereCategory('download')->orderBy('id', 'asc'),
            'guide' => News::whereCategory('guide')->orderBy('id', 'asc')
        ]);
    }
}
