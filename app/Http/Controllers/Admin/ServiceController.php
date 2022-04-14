<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Config;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ServiceRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $services = Service::all();

        foreach ($services as $service) {
            $request->validate([
                $service->key . '_price' => 'required|numeric'
            ]);
            $service->enabled = $request->has($service->key . '_enabled');
            $service->price = $request->{$service->key . '_price'};
            $service->save();
        }

        return redirect(route('service.index'))->with('success', __('service.config_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ServiceRequest $request
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }

    public function settings()
    {
        return view('admin.service.settings');
    }

    public function updateSettings(ServiceRequest $request)
    {
        $configs = $request->except('_token');
        foreach ($configs as $config => $value) {
            Config::write('pw-config.' . $config, $value);
        }
        return redirect()->back()->with('success', __('service.config_success'));
    }
}
