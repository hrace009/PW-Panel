<?php


return [
    'title' => 'Ranking',
    'config' => 'Configuration',
    'role' => [
        'ignore' => 'Role ID\'s to Ignore',
        'desc' => 'Role ID\'s that won\'t show in the player rankings, seperate with (,)'
    ],
    'faction' => [
        'ignore' => 'Faction  ID\'s to Ignore',
        'desc' => 'Faction  ID\'s that won\'t show in the faction rankings, seperate with (,)'
    ],
    'force' => [
        'player' => 'Player ranking force update hase been success!',
        'faction' => 'Faction ranking force update hase been success!',
        'territories' => 'Territories ranking force update hase been success!',
        'manual' => [
            'player' => 'Force Manual Update Players',
            'player_message' => 'Click button bellow to force manual update Players table on database',
            'faction' => 'Force Manual Update Faction',
            'faction_message' => 'Click button bellow to force manual update Faction table on database',
            'terrotories' => 'Force Manual Update Territories',
            'terrotories_message' => 'Click button bellow to force manual update Territories table on database',
        ],
        'failed' => 'Server offline, please try again later',
    ],
    'process' => 'Process!',
    'process_desc' => 'Execute the request!',
    'name' => 'Name',
    'class' => 'Class',
    'guild' => 'Guild',
    'members' => 'Members',
    'leader' => 'Leader',
    'player' => 'Player',
    'factions' => 'Faction',
    'type' => [
        'level' => 'Level',
        'rep' => 'Reputation',
        'time' => 'Time Online',
        'pvp' => 'PvP Kills',
        'members' => 'Members',
        'territories' => 'Territories',
        'pariah_time' => 'Wanted Time'
    ],
    'time' => [
        'days' => 'Days',
        'day' => 'Day',
        'hours' => 'Hours',
        'hour' => 'Hour'
    ],
    'gender' => [
        'caption' => 'Gender',
        '0' => 'Male',
        '1' => 'Female'
    ],
    'spouse' => [
        'caption' => 'Spouse',
        '4everalone' => '4 Ever Alone',
    ],
];
