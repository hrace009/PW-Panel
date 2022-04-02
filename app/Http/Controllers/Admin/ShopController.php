<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShopRequest;
use App\Models\Shop;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Config;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $shops = Shop::paginate(config('pw-config.shop.page'));
        return view('admin.shop.index', [
            'shops' => $shops,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.shop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ShopRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(ShopRequest $request)
    {
        $image = $request->file('image')->getClientOriginalName();
        $icon = $request->file('icon')->getClientOriginalName();
        $request->file('image')->storeAs('shops/image', $image, 'public');
        $request->file('icon')->storeAs('shops/icon', $icon, 'public');

        $input = $request->all();
        $input['image'] = $image;
        $input['icon'] = $icon;
        $input['shareable'] = $request->has('shareable');
        Shop::create($input);

        return redirect(route('shop.index'))->with('success', __('shop.create_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $shops = Shop::findOrFail($id);
        return view('admin.shop.edit', [
            'shops' => $shops
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ShopRequest $request
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(ShopRequest $request, int $id)
    {
        $image = $request->file('image')->getClientOriginalName();
        $icon = $request->file('icon')->getClientOriginalName();
        $request->file('image')->storeAs('shops/image', $image, 'public');
        $request->file('icon')->storeAs('shops/icon', $icon, 'public');

        $input = $request->except(['_token', '_method']);
        $input['image'] = $image;
        $input['icon'] = $icon;
        $input['shareable'] = $request->has('shareable');

        Shop::whereId($id)->update($input);

        return redirect(route('shop.index'))->with('success', __('shop.edit_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $item = Shop::findOrFail($id);
        $item->delete();

        return redirect(route('shop.index'))->with('success', __('shop.destroy'));
    }

    /**
     * Show the form for settings the specified resource.
     *
     * @param Shop $shop
     * @return Application|Factory|View
     */
    public function settings(Shop $shop)
    {
        return view('admin.shop.settings');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function saveSettings(Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'item_page' => 'required|numeric'
        ]);
        Config::write('pw-config.shop.page', $validate['item_page']);
        return redirect()->back()->with('success', __('admin.configSaved'));
    }

    /**
     * Handle upload image from Tiny MCE Editor
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function upload(Request $request): JsonResponse
    {
        $fileName = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('shops', $fileName, 'public');
        return response()->json(['location' => url('/storage/' . $path)]);
    }
}
