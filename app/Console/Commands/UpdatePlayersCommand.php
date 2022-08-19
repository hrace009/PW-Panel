<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Console\Commands;

use App\Models\Player;
use App\Models\User;
use hrace009\PerfectWorldAPI\API;
use Illuminate\Console\Command;

class UpdatePlayersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pw:update-players';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is to update Players rank table';

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
        }
        return 0;
    }
}
