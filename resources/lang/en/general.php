<?php

/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

return [
    'loading' => 'Loading...',
    'dashboard' => [
        'profile' => [
            'header' => 'Profile',
            'charList' => [
                'title' => 'My Characters',
                'id' => 'ID: :n',
                'description' => 'List of your character on this account.'
            ],
            'updatePin' => [
                'title' => 'Update Pin',
                'description' => 'Ensure your account is using a random pin to stay secure.',
                'current' => 'Current Pin',
                'new' => 'New Pin',
                'confirm' => 'Confirm Pin',
                'error' => 'The provided pin does not match your current pin.'
            ],
        ],
    ],
    'character' => [
        'success' => 'You\'ve successfully selected a character.',
        'error' => [
            'role' => 'Can\'t get role.',
            'list' => 'We can\'t retrieve your characters, please try again later.',
            'not_selected' => 'You must select a character before proceeding.'
        ],
        'select' => 'Select Character',
    ],
    'menu' => [
        'dashboard' => 'Dashboard',
        'shop' => 'Shop',
    ],
    'saved' => 'Saved.',
    'Save' => 'Save',
    'delete' => 'Delete',
    'update' => 'Update',
    'serverOffline' => 'The server isn\'t online, please try again later.',
    'language' => 'Language',
    'logout' => 'Log Out',
    'adminArea' => 'Admin Area',
    'memberArea' => 'Member Area',
    'balance' => 'Balance',
    'config_save_desc' => 'Save configuration.',
    'cron' => [
        'add' => 'Automate Your Panel',
        'info' => 'Adding this cron job will automate the voting transfer and ranking updates.',
        'job' => '* * * * * php ' . base_path('artisan') . ' schedule:run >> /dev/null 2>&1'
    ],
    'not_enough' => 'You don\'t have enough :currency.',
    'restricted' => 'Restricted area!'
];
