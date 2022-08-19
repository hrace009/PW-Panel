<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Console\Commands;

use App\Models\Territories;
use hrace009\PerfectWorldAPI\API;
use Illuminate\Console\Command;

class UpdateTerritoriesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pw:update-territories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command to update Territories table';

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
        }
        return 0;
    }
}
