<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helper\RandomStringGenerator;
use App\Http\Requests\VoucherRequest;
use App\Models\Voucher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $vouchers = Voucher::paginate(5);
        return view('admin.voucher.index', [
            'vouchers' => $vouchers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $random = strtoupper(RandomStringGenerator::getVoucherCode());
        return view('admin.voucher.create', [
            'randomAlphaNum' => $random,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VoucherRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(VoucherRequest $request)
    {
        $input = $request->all();
        Voucher::create($input);
        return redirect(route('voucher.index'))->with('success', __('voucher.create_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param Voucher $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(Voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Voucher $voucher
     * @return Application|Factory|View
     */
    public function edit(Voucher $voucher)
    {
        return view('admin.voucher.edit', [
            'voucher' => $voucher
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param VoucherRequest $request
     * @param Voucher $voucher
     * @return Application|Redirector|RedirectResponse
     */
    public function update(VoucherRequest $request, Voucher $voucher)
    {
        $voucher->update($request->all());
        return redirect(route('voucher.index'))->with('success', __('voucher.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Voucher $voucher
     * @return RedirectResponse
     */
    public function destroy(Request $request, Voucher $voucher)
    {
        $voucher->delete();
        return redirect(route('voucher.index'))->with('success', __('voucher.destroy_success'));
    }
}
