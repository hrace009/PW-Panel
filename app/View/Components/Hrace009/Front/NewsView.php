<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\View\Components\Hrace009\Front;

use App\Models\News;
use App\Models\User;
use Illuminate\View\Component;

class NewsView extends Component
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
        return view('front.news.view', [
            'news' => News::orderBy('created_at', 'desc')->paginate(config('pw-config.news.page')),
            'user' => new User(),
        ]);
    }
}
