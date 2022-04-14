<?php

return [
    'title' => 'Ingame Service',
    'view' => 'Edit Service',
    'config' => 'Configuration',
    'config_success' => 'Your configuration has been save!',
    'enable' => 'Enable',
    'disable' => 'Disable',
    'price' => 'Price',
    'label' => [
        'broadcast' => 'Broadcast Message',
        'virtual_to_cubi' => config('pw-config.currency_name') . ' for Cubi',
        'cultivation_change' => 'Change Cultivation',
        'gold_to_virtual' => 'Ingame Gold for ' . config('pw-config.currency_name'),
        'level_up' => 'Level Up',
        'max_meridian' => 'Meridian Upgrade',
        'reset_exp' => 'Reset EXP',
        'reset_sp' => 'Reset SP',
        'reset_stash_password' => 'Reset Stash Password',
        'teleport' => 'Teleport'
    ],
    'desc' => [
        'broadcast' => 'Make an announcement in-game, you will be heard!',
        'virtual_to_cubi' => 'Exchange your website currency for cubi in-game.',
        'cultivation_change' => 'Change from sage to demon, and vise versa.',
        'gold_to_virtual' => 'Exchange your in-game gold for the website currency.',
        'level_up' => 'Quickly and easily increase the level of your character.',
        'max_meridian' => 'Maxes meridian attribute for your character.',
        'reset_exp' => 'Resets the expereince of your character to zero.',
        'reset_sp' => 'Resets the spirit of your character to zero.',
        'reset_stash_password' => 'Recover access to your stash.',
        'teleport' => 'Teleports your character if you get stuck in-game and can\'t enter the game.'
    ],
    'teleport_world_tag' => 'World Tag',
    'teleport_x' => 'X Coordinates',
    'teleport_y' => 'Y Coordinates',
    'teleport_z' => 'Z Coordinates',
    'level_up' => 'Level Up',
    'level_up_cap' => 'Level Cap',
    'teleport_character' => 'Teleport Character'
];
