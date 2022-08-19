<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Console\Commands;

use App\Models\Faction;
use App\Models\Player;
use App\Models\Territories;
use hrace009\PerfectWorldAPI\API;
use hrace009\PerfectWorldAPI\Gamed;
use Illuminate\Console\Command;

class UpdateFactionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pw:update-faction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update faction table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
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
        return 0;
    }

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
}
