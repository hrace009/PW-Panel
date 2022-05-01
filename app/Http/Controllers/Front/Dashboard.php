<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;

class Dashboard extends Controller
{
    public function getIndex()
    {
        return view('front.dashboard', [
            'news' => News::orderBy('created_at', 'desc')->paginate(config('pw-config.news.page')),
            'user' => new User(),
        ]);
    }
}
