<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

class Home extends Controller
{
    public function index()
    {
        return view('website.index');
    }
}
