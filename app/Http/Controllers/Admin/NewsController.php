<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function showCreate()
    {
        return view('admin.news.create');
    }

    public function showView()
    {
        return view('admin.news.view');
    }

    public function showSettings()
    {
        return view('admin.news.settings');
    }
}
