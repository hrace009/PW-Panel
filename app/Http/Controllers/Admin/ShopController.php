<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.shop.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $masks = [
            0 => __('shop.masks.0'),
            1 => __('shop.masks.1'),
            __('shop.equipment') => [
                2 => __('shop.masks.armor.2'),
                16 => __('shop.masks.armor.16'),
                64 => __('shop.masks.armor.64'),
                128 => __('shop.masks.armor.128'),
                256 => __('shop.masks.armor.256'),
                8 => __('shop.masks.armor.8')
            ],
            __('shop.fashion') => [
                8192 => __('shop.masks.fashion.8192'),
                16384 => __('shop.masks.fashion.16384'),
                32768 => __('shop.masks.fashion.32768'),
                65536 => __('shop.masks.fashion.65536'),
                //33554432 => __( 'shop.masks.fashion.33554432' ),
                //536870912 => __( 'shop.masks.fashion.536870912' )
            ],
            __('shop.accessories') => [
                1536 => __('shop.masks.accessories.1536'),
                4 => __('shop.masks.accessories.4'),
                32 => __('shop.masks.accessories.32')
            ],
            __('shop.charms') => [
                1048576 => __('shop.masks.charms.1048576'),
                2097152 => __('shop.masks.charms.2097152')
            ],
            //2048 => __( 'shop.masks.2048' ),
            262144 => __('shop.masks.262144'),
            524288 => __('shop.masks.524288'),
            4096 => __('shop.masks.4096')
        ];
        return view('admin.shop.create', [
            'masks' => $masks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'price' => 'required|numeric|min:1',
            'item_id' => 'required|numeric|min:1',
            'count' => 'required|numeric|min:1',
            'max_count' => 'required|numeric|min:1',
            'protection_type' => 'numeric|min:0',
            'expire_date' => 'numeric',
            'discount' => 'numeric',
            'shareable' => 'required',
            'description' => 'required|min:20',
        ]);
        Shop::create($request->all());

        return redirect(route('shop.index'))->with('success', __('admin.shop.itemCreated'));
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
     * @param Shop $shop
     * @return Application|Factory|View
     */
    public function edit(Shop $shop)
    {
        return view('admin.shop.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
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
