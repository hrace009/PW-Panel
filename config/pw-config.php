<?php

/*
 *
 *  * @author Harris Marfel <hrace009@gmail.com>
 *  * @link https://www.hrace009.com
 *  * @copyright Copyright (c) 2021.
 *
 */

return [
    'chat_log_path' => '/home/ko2world/Core/Wanmei2015/logs/',
    'currency_name' => 'Ko2Coin',
    'encryption_type' => 'md5',
    'level_up_cap' => '105',
    'logo' => 'img/logo/logo.png',
    'server_ip' => '127.0.0.1',
    'server_name' => 'Ko2World Dev',
    'server_version' => '156',
    'teleport_world_tag' => '1',
    'teleport_x' => '1280.6788',
    'teleport_y' => '219.61784',
    'teleport_z' => '1021.2097',
    'version' => '1.0',
    'ignoreRoles' => '1,2,3',
    'ignoreFaction' => '16,60',
    'system' => [
        'apps' => [
            'news' => true,
            'shop' => true,
            'donate' => true,
            'voucher' => true,
            'inGameService' => true,
            'ranking' => true,
            'vote' => true,
        ],
    ],
    'news' => [
        'page' => '15',
    ],
    'shop' => [
        'page' => '15'
    ],
    'payment' => [
        'paymentwall' => [
            'status' => true,
            'widget_code' => 'p4_1',
            'widget_width' => '371',
            'widget_high' => '450',
            'project_key' => '21f130c3ba2c505e637a2fccbe3b3b62',
            'secret_key' => '57e0b3a2a7325f393446ca93b21e6778',
            'pingback_path' => 'pingback/paymentwall'
        ],
        'bank_transfer' => [
            'status' => true,
            'double' => true,
            'accountOwner' => 'Harris Yogasara',
            'bankAccountNo1' => '342234234324342',
            'bankName1' => 'MANDIRI',
            'bankAccountNo2' => '22132131',
            'bankName2' => 'BCA',
            'bankAccountNo3' => '21321332131',
            'bankName3' => 'BTPN',
            'multiply' => '100000',
            'limit' => '5000000',
            'CurrencySign' => 'Rp.',
            'payment_price' => '1000',
        ],
        'paypal' => [
            'status' => true,
            'double' => false,
            'client_id' => 'AfxQiO1ycaknL2cIDnhb_0C72apBxiPCMzccgkQR-Z1USdM6cHrER9s7nUWvi1KhfyE14-44CoKlihQZ',
            'secret' => 'EICI9jHYkE3nxB8_j3D1QPai-Z6d3dIVsM19zdflWFeLKEvGf1WWP61websXrCYdlaa6rUmb-uW5BcT1',
            'currency' => 'USD',
            'currency_per' => '1',
            'minimum' => '1'
        ]
    ],
];
