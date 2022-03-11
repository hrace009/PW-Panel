<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;

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

    public function upload(Request $request): \Illuminate\Http\JsonResponse
    {
        $fileName = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('uploads', $fileName, 'public');
        return response()->json(['location' => "/storage/$path"]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required',
            'category' => 'required'
        ]);
        News::create($request->all());
        return redirect()->back()->with('success', __('admin.news.created'));
    }
}
