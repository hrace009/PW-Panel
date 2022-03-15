<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $news = News::paginate(15);
        $user = new User();
        return view('admin.news.view', [
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
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'og_image' => 'required|image',
            'description' => 'required|min:20|max:255',
            'keywords' => 'required',
            'content' => 'required',
            'category' => 'required'
        ]);
        $image = $request->file('og_image')->getClientOriginalName();
        $request->file('og_image')->storeAs('og_image', $image, 'public');

        News::create([
            'title' => $request->get('title'),
            'og_image' => $image,
            'description' => $request->get('description'),
            'keywords' => $request->get('keywords'),
            'content' => $request->get('content'),
            'category' => $request->get('category'),
            'author' => $request->get('author'),
        ]);
        return redirect(route('news.index'))->with('success', __('admin.news.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $article = News::findOrFail($id);
        return view('admin.news.edit', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'og_image' => 'required|image',
            'description' => 'required|min:20|max:255',
            'keywords' => 'required',
            'content' => 'required',
            'category' => 'required'
        ]);
        $image = $request->file('og_image')->getClientOriginalName();
        $request->file('og_image')->storeAs('og_image', $image, 'public');

        News::whereId($id)->update([
            'title' => $request->get('title'),
            'og_image' => $image,
            'description' => $request->get('description'),
            'keywords' => $request->get('keywords'),
            'content' => $request->get('content'),
            'category' => $request->get('category'),
            'author' => $request->get('author'),
        ]);
        return redirect(route('news.index'))->with('success', __('admin.news.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $article = News::findOrFail($id);
        $article->delete();

        return redirect(route('news.index'))->with('success', __('admin.news.destroy'));
    }

    public function upload(Request $request): JsonResponse
    {
        $fileName = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('uploads', $fileName, 'public');
        return response()->json(['location' => url('/storage/' . $path)]);
    }

    public function settings()
    {
        return view('admin.news.settings');
    }
}
