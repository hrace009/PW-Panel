<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Toastr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class SystemController extends Controller
{
    public function getApps()
    {
        $apps = config('pw-config.system.apps');
        return view('admin.system.applications', [
            'apps' => $apps,
        ]);
    }

    public function getSettings()
    {
        return view('admin.system.settings');
    }

    public function saveApps(Request $request): RedirectResponse
    {
        $apps = config('pw-config.system.apps');
        foreach (array_keys($apps) as $app) {
            if ($request->has($app) === true) {
                Config::write('pw-config.system.apps.' . $app, true);
            } else {
                Config::write('pw-config.system.apps.' . $app, false);
            }
        }
        return redirect()->back()->with('success', __('admin.configSaved'));
    }

    public function saveSettings(Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'server_name' => 'required|string',
            'currency_name' => 'required|string',
            'server_ip' => 'required|ipv4',
            'server_version' => 'required|string',
            'encryption_type' => 'required|string',
        ]);
        foreach ($validate as $settings => $value) {
            Config::write('pw-config.' . $settings, $value);
        }
        return redirect()->back()->with('success', __('admin.configSaved'));
    }
}
