<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function create()
    {
        return view('admin.news.create');
    }

    public function showView()
    {
        $news = News::paginate(15);
        $user = new User();
        return view('admin.news.view', [
            'news' => $news,
            'user' => $user
        ]);
    }

    public function showSettings()
    {
        return view('admin.news.settings');
    }

    public function upload(Request $request): JsonResponse
    {
        $fileName = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('uploads', $fileName, 'public');
        return response()->json(['location' => url('/storage/' . $path)]);
    }

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
        return redirect()->back()->with('success', __('admin.news.created'));
    }
}
