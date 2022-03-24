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
        'news' => 'News',
        'shop' => 'Shop'
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
        'userEmail' => 'Email',
        'truename' => 'Full Name',
        'balance' => 'Balance',
        'role' => 'Role',
        'action' => 'Action',
        'amount' => 'Amount to give',
        'give' => 'Give',
        'to' => 'To',
        'add' => 'Coin Added!',
        'resetPass' => 'Force Reset Password and Pin for:',
        'enterNewPass' => 'Enter new password',
        'resetPassPin' => 'Reset Password & Pin',
        'confirm' => 'I confirm this action!',
        'note' => 'Note',
        'noteCaption' => 'New password and pin will be delivered to user email address.',
        'PassPinReset' => 'Success!, please check please ask user to check their emaill address.',
        'mustConfirm' => 'Failed!, Please confirm your action!',
        'email' => 'Enter new email',
        'changeEmail' => 'Change email for:',
        'btnChEmail' => 'Change Email!',
        'successEMail' => 'Email has been change!'

    ],
    'news' => [
        'create' => 'Create a News',
        'edit' => 'Update a News',
        'view' => 'View News',
        'settings' => 'Settings',
        'title' => 'Enter title',
        'category' => 'Select Category',
        'created' => 'News Created!',
        'og_image' => 'Open Graph Image',
        'description' => 'Description',
        'keywords' => 'Keywords',
        'update' => 'News has been Updated!',
        'destroy' => 'News delete!',
        'noNews' => 'No news here!',
        'try' => 'Try to create it one',
        'edit2' => 'Edit',
        'delete' => 'Delete',
        'perPage' => 'Articles Per Page'
    ],
    'shop' => [
        'create' => 'Add Item',
        'view' => 'Show Items',
        'settings' => 'Settings',
        'itemName' => 'Item Name',
        'itemPrice' => 'Price',
        'itemID' => 'Item ID',
        'itemOctets' => 'Octets',
        'itemMask' => 'Mask',
        'itemCount' => 'Count',
        'itemMaxCount' => 'Max Count',
        'itemProc' => 'Protection Type',
        'itemExpire' => 'Expire Date',
        'itemDiscount' => 'Discount',
        'itemShare' => 'Shareable',
        'itemCreated' => 'Item Created!'
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
        'for' => 'For'
    ],
];
