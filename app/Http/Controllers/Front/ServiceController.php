<?php


namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceLog;
use App\Models\Transfer;
use hrace009\PerfectWorldAPI\API;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('service.enable')->only('postPurchase');
        $this->middleware('selected.character')->only('postPurchase');
    }

    public function getIndex()
    {
        $services = Service::all();
        return view('front.service.index', [
            'services' => $services
        ]);
    }

    public function postPurchase(Request $request, Service $service)
    {
        if (!method_exists($this, $service->key)) {
            return redirect()->back()->with('error', __('service.no_service', ['service' => __('service.ingame.' . $service->key . '.title')]));
        } else {
            call_user_func_array([$this, $service->key], [$request, $service]);
            return redirect()->back();
        }
    }

    public function broadcast(Request $request, Service $service)
    {
        $this->validate($request, [
            'message' => 'required',
        ]);
        $user = Auth::user();
        $role = $user->characterId();
        $message = $request->message;

        if ($user->money >= $service->price) {
            if ($this->checkOnline($role)) {
                $api = new API();
                if ($api->worldChat($role, $message, 9)) {
                    $user->money = $user->money - $service->price;
                    $user->save();

                    ServiceLog::create([
                        'userid' => $user->ID,
                        'key' => $service->key,
                        'currency_type' => $service->currency_type,
                        'price' => $service->price
                    ]);

                    $type = 'success';
                    $note = __('service.ingame.' . $service->key . '.complete');
                } else {
                    $type = 'error';
                    $note = __('general.serverOffline');
                }
            } else {
                $type = 'error';
                $note = __('service.must_login');
            }
        } else {
            $type = 'error';
            $note = __('general.not_enough', ['currency' => config('pw-config.currency_name')]);
        }

        return redirect()->back()->with($type, $note);
    }

    public function checkOnline($role)
    {
        $result = false;
        $api = new API();
        $totalOnline = $api->getOnlineList();

        foreach ($totalOnline as $online) {
            if ($online['roleid'] == $role) {
                $result = true;
            }
        }
        return $result;
    }

    public function virtual_to_cubi(Request $request, Service $service)
    {
        $this->validate($request, [
            'quantity' => 'required|numeric|min:1',
        ]);

        $user = Auth::user();
        $role = $user->characterId();

        if ($user->money >= ($request->quantity * $service->price)) {
            if (!$this->checkOnline($role)) {
                $user->money = $user->money - ($request->quantity * $service->price);
                $user->save();

                ServiceLog::create([
                    'userid' => $user->ID,
                    'key' => $service->key,
                    'currency_type' => $service->currency_type,
                    'price' => ($request->quantity * $service->price)
                ]);

                Transfer::create([
                    'user_id' => $user->ID,
                    'zone_id' => 1,
                    'cash' => $request->quantity * 100
                ]);
                $type = 'success';
                $note = __('service.ingame.' . $service->key . '.complete');
            } else {
                $type = 'error';
                $note = __('service.must_logout');
            }
        } else {
            $type = 'error';
            $note = __('general.not_enough', ['currency' => config('pw-config.currency_name')]);
        }

        return redirect()->back()->with($type, $note);
    }

    public function cultivation_change(Request $request, Service $service)
    {
        $user = Auth::user();
        $role = $user->characterId();

        if ($user->money >= $service->price) {
            if (!$this->checkOnline($role)) {
                $api = new API();
                if ($role_data = $api->getRole($role)) {
                    if ($role_data['status']['level2'] != 0) {
                        $role_data['status']['level2'] = ($role_data['status']['level2'] == 22) ? 32 : 22;

                        if ($api->putRole($role, $role_data)) {
                            $user->money = $user->money - $service->price;
                            $user->save();

                            ServiceLog::create([
                                'userid' => $user->ID,
                                'key' => $service->key,
                                'currency_type' => $service->currency_type,
                                'price' => $service->price
                            ]);

                            $type = 'success';
                            $note = __('service.ingame.' . $service->key . '.complete');
                        } else {
                            $type = 'error';
                            $note = __('general.serverOffline');
                        }
                    } else {
                        $type = 'error';
                        $note = __('service.cultivation_not_unlocked');
                    }
                } else {
                    $type = 'error';
                    $note = __('general.serverOffline');
                }
            } else {
                $type = 'error';
                $note = __('service.must_logout');
            }
        } else {
            $type = 'error';
            $note = __('general.not_enough', ['currency' => config('pw-config.currency_name')]);
        }
        return redirect()->back()->with($type, $note);
    }

    public function gold_to_virtual(Request $request, Service $service)
    {
        $this->validate($request, [
            'quantity' => 'required|numeric|min:1',
        ]);

        $user = Auth::user();
        $role = $user->characterId();

        if (!$this->checkOnline($role)) {
            $api = new API();
            if ($role_data = $api->getRole($role)) {
                if ($role_data['pocket']['money'] > ($request->quantity * $service->price)) {
                    $role_data['pocket']['money'] = $role_data['pocket']['money'] - ($request->quantity * $service->price);

                    if ($api->putRole($role, $role_data)) {
                        $user->money = $user->money + $request->quantity;
                        $user->save();

                        ServiceLog::create([
                            'userid' => $user->ID,
                            'key' => $service->key,
                            'currency_type' => $service->currency_type,
                            'price' => ($request->quantity * $service->price)
                        ]);

                        $type = 'success';
                        $note = __('service.ingame.' . $service->key . '.complete', ['quantity' => $request->quantity, 'currency' => config('pw-config.currency_name')]);
                    } else {
                        $type = 'error';
                        $note = __('general.serverOffline');
                    }
                } else {
                    $type = 'error';
                    $note = __('general.not_enough_gold');
                }
            } else {
                $type = 'error';
                $note = __('general.serverOffline');
            }
        } else {
            $type = 'error';
            $note = __('service.must_logout');
        }

        return redirect()->back()->with($type, $note);
    }

    public function level_up(Request $request, Service $service)
    {
        $this->validate($request, [
            'quantity' => 'required|numeric|min:1',
        ]);

        $user = Auth::user();
        $role = $user->characterId();

        if ($user->money >= ($request->quantity * $service->price)) {
            if (!$this->checkOnline($role)) {
                $api = new API();
                if ($role_data = $api->getRole($role)) {
                    if (($role_data['status']['level'] + $request->quantity) <= config('pw-config.level_up_cap')) {
                        $role_data['status']['level'] = $role_data['status']['level'] + $request->quantity;
                        $role_data['status']['pp'] = $role_data['status']['pp'] + ($request->quantity * 5);

                        if (!in_array($role_data['base']['cls'], [9, 1, 2, 3, 7])) {
                            $role_data['status']['hp'] = $role_data['status']['hp'] + ($request->quantity * 20);
                            $role_data['status']['mp'] = $role_data['status']['mp'] + ($request->quantity * 28);
                        } elseif (!in_array($role_data['base']['cls'], [6, 5])) {
                            $role_data['status']['hp'] = $role_data['status']['hp'] + ($request->quantity * 26);
                            $role_data['status']['mp'] = $role_data['status']['mp'] + ($request->quantity * 22);
                        } else {
                            $role_data['status']['hp'] = $role_data['status']['hp'] + ($request->quantity * 30);
                            $role_data['status']['mp'] = $role_data['status']['mp'] + ($request->quantity * 18);
                        }

                        if ($api->putRole($role, $role_data)) {
                            $user->money = $user->money - ($request->quantity * $service->price);
                            $user->save();

                            ServiceLog::create([
                                'userid' => $user->ID,
                                'key' => $service->key,
                                'currency_type' => $service->currency_type,
                                'price' => ($request->quantity * $service->price)
                            ]);

                            $type = 'success';
                            $note = __('service.ingame.' . $service->key . '.complete', ['quantity' => $request->quantity]);
                        } else {
                            $type = 'error';
                            $note = __('general.serverOffline');
                        }
                    } else {
                        $type = 'error';
                        $note = __('service.max_level');
                    }
                } else {
                    $type = 'error';
                    $note = __('general.serverOffline');
                }
            } else {
                $type = 'error';
                $note = __('service.must_logout');
            }
        } else {
            $type = 'error';
            $note = __('general.not_enough', ['currency' => config('pw-config.currency_name')]);
        }
        return redirect()->back()->with($type, $note);
    }

    public function max_meridian(Request $request, Service $service)
    {
        $user = Auth::user();
        $role = $user->characterId();

        if ($user->money >= $service->price) {
            if (!$this->checkOnline($role)) {
                $api = new API();
                if ($role_data = $api->getRole($role)) {
                    if ($role_data['status']['level'] >= 40) {
                        $meridian_hex = '0000005000000000000000000000000500000064000000000000000100000000000000000000000000000000000000000000000000000000';

                        if ($role_data['status']['meridian_data'] != $meridian_hex) {
                            $role_data['status']['meridian_data'] = $meridian_hex;

                            if ($api->putRole($role, $role_data)) {
                                $user->money = $user->money - $service->price;
                                $user->save();

                                ServiceLog::create([
                                    'userid' => $user->ID,
                                    'key' => $service->key,
                                    'currency_type' => $service->currency_type,
                                    'price' => $service->price
                                ]);

                                $type = 'success';
                                $note = __('service.ingame.' . $service->key . '.complete');
                            } else {
                                $type = 'error';
                                $note = __('general.serverOffline');
                            }
                        } else {
                            $type = 'error';
                            $note = __('service.meridian_maxed');
                        }
                    } else {
                        $type = 'error';
                        $note = __('service.not_high_enough_level');
                    }
                } else {
                    $type = 'error';
                    $note = __('general.serverOffline');
                }
            } else {
                $type = 'error';
                $note = __('service.must_logout');
            }
        } else {
            $type = 'error';
            $note = __('general.not_enough', ['currency' => config('pw-config.currency_name')]);
        }

        return redirect()->back()->with($type, $note);
    }

    public function reset_exp(Request $request, Service $service)
    {
        $user = Auth::user();
        $role = $user->characterId();

        if ($user->money >= $service->price) {
            if (!$this->checkOnline($role)) {
                $api = new API();
                if ($role_data = $api->getRole($role)) {
                    $role_data['status']['exp'] = 0;

                    if ($api->putRole($role, $role_data)) {
                        $user->money = $user->money - $service->price;
                        $user->save();

                        ServiceLog::create([
                            'userid' => $user->ID,
                            'key' => $service->key,
                            'currency_type' => $service->currency_type,
                            'price' => $service->price
                        ]);

                        $type = 'success';
                        $note = __('service.ingame.' . $service->key . '.complete');
                    } else {
                        $type = 'error';
                        $note = __('general.serverOffline');
                    }
                } else {
                    $type = 'error';
                    $note = __('general.serverOffline');
                }
            } else {
                $type = 'error';
                $note = __('service.must_logout');
            }
        } else {
            $type = 'error';
            $note = __('general.not_enough', ['currency' => config('pw-config.currency_name')]);
        }

        return redirect()->back()->with($type, $note);
    }

    public function reset_sp(Request $request, Service $service)
    {
        $user = Auth::user();
        $role = $user->characterId();

        if ($user->money >= $service->price) {
            if (!$this->checkOnline($role)) {
                $api = new API();
                if ($role_data = $api->getRole($role)) {
                    $role_data['status']['sp'] = 0;

                    if ($api->putRole($role, $role_data)) {
                        $user->money = $user->money - $service->price;
                        $user->save();

                        ServiceLog::create([
                            'userid' => $user->ID,
                            'key' => $service->key,
                            'currency_type' => $service->currency_type,
                            'price' => $service->price
                        ]);

                        $type = 'success';
                        $note = __('service.ingame.' . $service->key . '.complete');
                    } else {
                        $type = 'error';
                        $note = __('general.serverOffline');
                    }
                } else {
                    $type = 'error';
                    $note = __('general.serverOffline');
                }
            } else {
                $type = 'error';
                $note = __('service.must_logout');
            }
        } else {
            $type = 'error';
            $note = __('general.not_enough', ['currency' => config('pw-config.currency_name')]);
        }

        return redirect()->back()->with($type, $note);
    }

    public function reset_stash_password(Request $request, Service $service)
    {
        $user = Auth::user();
        $role = $user->characterId();

        if ($user->money >= $service->price) {
            if (!$this->checkOnline($role)) {
                $api = new API();
                if ($role_data = $api->getRole($role)) {
                    if ($role_data['status']['storehousepasswd'] != NULL) {
                        $role_data['status']['storehousepasswd'] = '';

                        if ($api->putRole($role, $role_data)) {
                            $user->money = $user->money - $service->price;
                            $user->save();

                            ServiceLog::create([
                                'userid' => $user->ID,
                                'key' => $service->key,
                                'currency_type' => $service->currency_type,
                                'price' => $service->price
                            ]);

                            $type = 'success';
                            $note = __('service.ingame.' . $service->key . '.complete');
                        } else {
                            $type = 'error';
                            $note = __('general.serverOffline');
                        }
                    } else {
                        $type = 'error';
                        $note = __('service.no_stash_password');
                    }
                } else {
                    $type = 'error';
                    $note = __('general.serverOffline');
                }
            } else {
                $type = 'error';
                $note = __('service.must_logout');
            }
        } else {
            $type = 'error';
            $note = __('general.not_enough', ['currency' => config('pw-config.currency_name')]);
        }

        return redirect()->back()->with($type, $note);
    }

    public function teleport(Request $request, Service $service)
    {
        $user = Auth::user();
        $role = $user->characterId();

        if ($user->money >= $service->price) {
            if (!$this->checkOnline($role)) {
                $api = new API();
                if ($role_data = $api->getRole($role)) {
                    $role_data['status']['posx'] = config('pw-config.teleport_x');
                    $role_data['status']['posy'] = config('pw-config.teleport_y');
                    $role_data['status']['posz'] = config('pw-config.teleport_z');
                    $role_data['status']['worldtag'] = config('pw-config.teleport_world_tag');

                    if ($api->putRole($role, $role_data)) {
                        $user->money = $user->money - $service->price;
                        $user->save();

                        ServiceLog::create([
                            'userid' => $user->ID,
                            'key' => $service->key,
                            'currency_type' => $service->currency_type,
                            'price' => $service->price
                        ]);

                        $type = 'success';
                        $note = __('service.ingame.' . $service->key . '.complete');
                    } else {
                        $type = 'error';
                        $note = __('general.serverOffline');
                    }
                } else {
                    $type = 'error';
                    $note = __('general.serverOffline');
                }
            } else {
                $type = 'error';
                $note = __('service.must_logout');
            }
        } else {
            $type = 'error';
            $note = __('general.not_enough', ['currency' => config('pw-config.currency_name')]);
        }

        return redirect()->back()->with($type, $note);
    }
}
