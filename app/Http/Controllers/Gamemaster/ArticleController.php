<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2023.
 */

namespace App\Http\Controllers\Gamemaster;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $news = News::paginate(config('pw-config.news.page'));
        $user = new User();
        return view('gm.article.index', [
            'news' => $news,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('gm.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsRequest $request
     * @return RedirectResponse
     */
    public function store(NewsRequest $request): RedirectResponse
    {
        $image = $request->file('og_image')->getClientOriginalName();
        $request->file('og_image')->storeAs('og_image', $image, config('filesystems.default'));

        $input = $request->all();
        $input['og_image'] = $image;

        $slug = \Str::slug($request->title);
        $count = News::where('slug', 'LIKE', '%' . $slug . '%')->count();
        $input['slug'] = $count ? "{$slug}-{$count}" : $slug;

        News::create($input);
        return redirect(route('article.index'))->with('success', __('news.create_success'));
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $article = News::findOrFail($id);
        return view('gm.article.edit', [
            'article' => $article
        ]);
    }

    public function update(NewsRequest $request, int $id): RedirectResponse
    {
        $image = $request->file('og_image')->getClientOriginalName();
        $request->file('og_image')->storeAs('og_image', $image, config('filesystems.default'));

        News::whereId($id)->update([
            'title' => $request->get('title'),
            'slug' => \Str::slug($request->title),
            'og_image' => $image,
            'description' => $request->get('description'),
            'keywords' => $request->get('keywords'),
            'content' => $request->get('content'),
            'category' => $request->get('category'),
            'author' => $request->get('author'),
        ]);
        return redirect(route('article.index'))->with('success', __('news.edit_success'));
    }

    public function destroy($id)
    {
        $article = News::findOrFail($id);
        $article->delete();

        return redirect(route('article.index'))->with('success', __('news.remove_success'));
    }
}
