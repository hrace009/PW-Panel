<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

class Home extends Controller
{
    public function index()
    {
        return view('website.index');
    }
}
