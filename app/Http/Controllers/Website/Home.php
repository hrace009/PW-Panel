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
        return view('website.index', [
            'news' => News::orderBy('id', 'desc')->whereNotIn('category', ['download', 'guide'])->paginate(3),
            'user' => new User()
        ]);
    }

    public function indexCategory(string $category)
    {
        return view('website.index', [
            'news' => News::whereCategory($category)->paginate(3),
            'user' => new User()
        ]);
    }

    public function showPost(string $slug)
    {
        return view('website.article', [
            'article' => News::whereSlug($slug)->firstOrFail(),
            'user' => new User()
        ]);
    }

    public function indexTags(string $tag)
    {
        return view('website.index', [
            'news' => News::where('keywords', 'LIKE', '%' . $tag . '%')->orderByDesc('created_at')->paginate(3),
            'user' => new User()
        ]);
    }
}
