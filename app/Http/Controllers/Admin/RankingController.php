<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RankingRequest;
use App\Models\Faction;
use App\Models\Player;
use App\Models\Territories;
use App\Models\User;
use hrace009\PerfectWorldAPI\API;
use hrace009\PerfectWorldAPI\Gamed;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;

class RankingController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function getSettings()
    {
        return view('admin.ranking.settings');
    }

    /**
     * @param RankingRequest $request
     * @return RedirectResponse
     */
    public function postSettings(RankingRequest $request): RedirectResponse
    {
        $settings = $request->except('_token');
        foreach ($settings as $setting => $value) {
            Config::write('pw-config.' . $setting, $value);
        }
        return redirect()->back()->with('success', __('admin.configSaved'));
    }

    /**
     * @return RedirectResponse
     */
    public function updatePlayer(): RedirectResponse
    {
        $api = new API();
        if ($api->online) {
            set_time_limit(0);
            $users = User::all();

            foreach ($users as $user) {
                $roles = $api->getRoles($user->ID) ? $api->getRoles($user->ID)['roles'] : [];

                foreach ($roles as $role) {
                    $role_data = $api->getRole($role['id']);
                    $var_data = (config('pw-config.server_version') !== '07') ? $api->parseOctet($role_data['status']['var_data'], 'var_data') : ['pk_count' => 0, 'dead_flag' => 0];
                    if (!empty($role_data['status']['faction_contrib'])) {
                        $faction_contrib = $api->parseOctet($role_data['status']['faction_contrib'], 'faction_contrib');
                    }
                    if (!empty($role_data['status']['force_data'])) {
                        $force_data = $api->parseOctet($role_data['status']['force_data'], 'force_data');
                    }
                    if (!empty($role_data['status']['title_data'])) {
                        $title_data = $api->parseOctet($role_data['status']['title_data'], 'title_data');
                    }
                    $user_faction = $api->getUserFaction($role['id']);
                    if (!empty($user_faction['fid'])) {
                        $faction_info = $api->getFactionInfo($user_faction['fid']);
                    }
                    $role_info = [
                        'id' => $role_data['base']['id'],
                        'name' => $role_data['base']['name'],
                        'cls' => $role_data['base']['cls'],
                        'gender' => $role_data['base']['gender'],
                        'spouse' => $role_data['base']['spouse'],
                        'level' => $role_data['status']['level'],
                        'level2' => $role_data['status']['level2'],
                        'hp' => $role_data['status']['hp'],
                        'mp' => $role_data['status']['mp'],
                        'pariah_time' => $role_data['status']['pariah_time'],
                        'reputation' => $role_data['status']['reputation'],
                        'time_used' => $role_data['status']['time_used'],
                        'pk_count' => $var_data['pk_count'],
                        'dead_flag' => $var_data['dead_flag'],
                        'force_id' => !empty($force_data['cur_force_id']) ? $force_data['cur_force_id'] : 0,
                        'title_id' => !empty($title_data['cur_title_id']) ? $title_data['cur_title_id'] : 0,
                        'faction_id' => !empty($user_faction['fid']) ? $user_faction['fid'] : '',
                        'faction_name' => !empty($faction_info['name']) ? $faction_info['name'] : '',
                        'faction_role' => !empty ($user_faction['role']) ? $user_faction['role'] : '',
                        'faction_contrib' => !empty($faction_contrib['consume_contrib']) ? $faction_contrib['consume_contrib'] : 0,
                        'faction_feat' => !empty($faction_contrib['cumulate_contrib']) ? $faction_contrib['cumulate_contrib'] : 0,
                        'equipment' => json_encode($role_data['equipment']),
                    ];
                    if ($player = Player::find($role_info['id'])) {
                        $player->update($role_info);
                    } else {
                        Player::create($role_info);
                    }
                    unset($role_data, $var_data, $force_data, $faction_info, $faction_contrib, $user_faction);
                }
            }

            return redirect()->back()->with('success', __('ranking.force.player'));
        }
        return redirect()->back()->with('error', __('ranking.force.failed'));
    }

    /**
     * @return RedirectResponse
     */
    public function updateFaction(): RedirectResponse
    {
        $gamed = new Gamed();
        $api = new API();
        $handler = NULL;
        if ($api->online) {
            set_time_limit(0);
            do {
                $raw_info = $api->getRaw('factioninfo', $handler);
                if (isset($raw_info['Raw']) || count($raw_info['Raw']) > 1) {
                    foreach ($raw_info['Raw'] as $i => $iValue) {
                        if (empty($iValue['key']) || empty($iValue['value'])) {
                            unset($raw_info['Raw'][$i]);
                            continue;
                        }
                        $id = $gamed->getArrayValue(unpack("N", pack("H*", $iValue['key'])), 1);
                        $pack = pack("H*", $iValue['value']);
                        $faction = $gamed->unmarshal($pack, $api->data['FactionInfo']);
                        if (!empty($faction['master']['roleid']) && $faction['master']['roleid'] > 0) {
                            $user_faction = $api->getUserFaction($faction['master']['roleid']);
                            $faction_info = [
                                'id' => $faction['fid'],
                                'name' => $faction['name'],
                                'level' => $faction['level'] + 1,
                                'master' => $faction['master']['roleid'],
                                'master_name' => $user_faction['name'],
                                'members' => count($faction['member']),
                                'reputation' => ($this->getFactionStat($faction['fid'], 'reputation') > 0) ? $this->getFactionStat($faction['fid'], 'reputation') : 0,
                                'time_used' => ($this->getFactionStat($faction['fid'], 'time_used') > 0) ? $this->getFactionStat($faction['fid'], 'time_used') : 0,
                                'pk_count' => ($this->getFactionStat($faction['fid'], 'pk_count') > 0) ? $this->getFactionStat($faction['fid'], 'pk_count') : 0,
                                'announce' => $faction['announce'],
                                'territories' => Territories::where('owner', $faction['fid'])->count(),
                            ];

                            if ($faction = Faction::find($faction_info['id'])) {
                                $faction->update($faction_info);
                            } else {
                                Faction::create($faction_info);
                            }
                        }
                        unset($id, $faction, $user_faction, $iValue['value']);
                    }
                    $raw_count = count($raw_info['Raw']) - 1;
                    $last_raw = $raw_info['Raw'][$raw_count];
                    $last_key = $last_raw['key'];
                    $new_key = hexdec($last_key) + 1;
                    $handler = bin2hex(pack("N*", $new_key));
                };
            } while (TRUE);
        }
        return redirect()->back()->with('success', __('ranking.force.faction'));
    }

    /**
     * @param $fid
     * @param $stat
     * @param int $total
     * @return int|mixed
     */
    protected function getFactionStat($fid, $stat, int $total = 0)
    {
        $players = Player::where('faction_id', $fid)->get();
        foreach ($players as $k => $v) {
            if ($v[$stat] > 0) {
                $total += $v[$stat];
            }
        }
        return $total;
    }

    /**
     * @return RedirectResponse
     */
    public function updateTerritories(): RedirectResponse
    {
        $api = new API();
        if ($api->online) {
            $territories = $api->getTerritories() ? $api->getTerritories()['Territory'] : [];
            foreach ($territories as $territory) {
                if ($territory['owner'] > 0) {
                    $owner = $api->getFactionInfo($territory['owner']);
                }
                if ($territory['challenger'] > 0) {
                    $challenger = $api->getFactionInfo($territory['challenger']);
                }
                $territory_info = [
                    'id' => $territory['id'],
                    'level' => $territory['level'],
                    'owner' => $territory['owner'],
                    'owner_name' => !empty($owner['name']) ? $owner['name'] : '',
                    'occupy_time' => $territory['occupy_time'],
                    'challenger' => $territory['challenger'],
                    'challenger_name' => !empty($challenger['name']) ? $challenger['name'] : '',
                    'deposit' => $territory['deposit'],
                    'cutoff_time' => $territory['cutoff_time'],
                    'battle_time' => $territory['battle_time'],
                    'bonus_time' => $territory['bonus_time'],
                    'color' => $territory['color'],
                    'status' => $territory['status'],
                    'timeout' => $territory['timeout'],
                    'maxbonus' => $territory['maxbonus'],
                    'challenge_time' => $territory['challenge_time'],
                    'challengerdetails' => $territory['challengerdetails'],
                ];
                if ($territory = Territories::find($territory_info['id'])) {
                    $territory->update($territory_info);
                } else {
                    Territories::create($territory_info);
                }
                unset($owner, $challenger);
            }
            return redirect()->back()->with('success', __('ranking.force.territories'));
        }
        return redirect()->back()->with('error', __('ranking.force.failed'));
    }
}
