<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class Dashboard extends Controller
{
    public function getIndex()
    {
        return view('front.dashboard');
    }
}
