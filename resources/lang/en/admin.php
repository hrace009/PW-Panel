<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */


return [
    'dashboard' => 'Dashboard',
    'welcome!' => 'Welcome to your ' . config('app.name') . ' admin dashboard!',
    'playerOnline' => 'Players Online',
    'accountRegistered' => 'Registered Account',
    'totalCharacter' => 'Character Created',
    'totalFaction' => 'Faction Created',
    'menu' => [
        'system' => 'System',
        'apps' => 'Application',
        'settings' => 'Settings',
        'members' => 'Members',
        'manage' => 'Manage Members',
    ],
    'application' => [
        'news' => 'News',
        'shop' => 'Shop',
        'donate' => 'Donate',
        'voucher' => 'Voucher',
        'inGameService' => 'Ingame Service',
        'ranking' => 'Ranking',
        'vote' => 'Vote',
        'bank' => 'Bank Transfer',
    ],
    'settings' => [
        'server' => 'Server Name',
        'currency' => 'Currency Name',
        'ip' => 'Server Ip',
        'version' => 'Server Version',
        'encryption' => 'Encryption Type'
    ],
    'members' => [
        'id' => 'ID',
        'name' => 'Login',
        'truename' => 'Full Name',
        'balance' => 'Balance',
        'role' => 'Role',
        'action' => 'Action',
        'amount' => 'Amount to give',
        'give' => 'Give',
        'to' => 'To',
        'add' => 'Coin Added!'
    ],
    'configSaved' => 'Configuration has been saved!',
    'encryption_type' => [
        'md5' => 'MD5',
        'base64' => 'Base64',
        'binsalt' => 'HexBin Salt',
    ],
    'pagination' => [
        'showing' => 'Showing',
        'to' => 'to',
        'of' => 'of',
        'results' => 'results',
    ],
];
