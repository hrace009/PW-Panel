<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;

class Home extends Controller
{
    public function index()
    {
        return view('website.index');
    }

    public function showPost(int $id)
    {
        return view( 'website.article', [
            'article' => News::findOrFail($id),
            'user' => new User()
        ]);
    }
}
