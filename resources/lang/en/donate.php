<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Donate Language Lines
    |--------------------------------------------------------------------------
    */

    'title' => 'Donate',
    'status' => 'Status',
    'on' => 'On',
    'off' => 'Off',
    'paymentwall_title' => 'Paymentwall',
    'paymentwall_desc' => 'Move switch to the right for activating Paymentwall',
    'no_methods' => 'Donation methods haven\'t been setup yet, please contact an administrator.',
    'error' => [
        'title' => 'Error',
        'message' => 'Please enter the dollar amount you would like to donate <b>OR</b> the amount of :currency you would like to receive.',
        'minimum' => 'You can\'t donate less than :min.'
    ],
    'double_notice' => '<b>Notice:</b> Double donation is active!',
    'double_donation' => 'Double',
    'double_desc' => 'Make double donate to active.',
    'paymentwall_link' => 'Widget Code',
    'paymentwall_link_desc' => 'Enter your paymentwall widget code.',
    'paymentwall_widget_width' => 'Widget Width',
    'paymentwall_widget_width_desc' => 'Enter width in pixel.',
    'paymentwall_widget_high' => 'Widget High',
    'paymentwall_widget_high_desc' => 'Enter high in pixel.',
    'paymentwall_key' => 'Secret Key',
    'paymentwall_key_desc' => 'Enter your paymentwall Secret Key.',
    'paymentwall_project_key' => 'Project Key',
    'paymentwall_project_key_desc' => 'Enter your paymentwall Project Key.',
    'paymentwall_preview' => 'Preview',
    'paymentwall_setup' => [
        'title' => 'How to Setup Paymentwall',
        'steps' => [
            1 => 'Login to Paymentwall merchant Account.',
            2 => 'Go to My Projects > Settings',
            3 => 'Change pingback type to URL',
            4 => 'Change URL to <code class="dark:text-cyan-400">' . url(config('pw-config.payment.paymentwall.pingback_path')) . '</code>',
            5 => 'Set PINGBACK SIGNATURE VERSION to \'1\''
        ]
    ],
    'bank' => [
        'title' => 'Manual Bank Transfer',
        'status' => 'Status',
        'status_desc' => 'Move switch to the right for activating Manual Bank Transfer',
        'double_desc' => 'Move switch to the right for activating Double donation.',
        'owner' => 'Owner',
        'owner_desc' => 'Enter your bank account owner name.',
        'bankName1' => 'Bank 1',
        'bankName2' => 'Bank 2',
        'bankName3' => 'Bank 3',
        'bankAccountNo1' => 'Account Number 1',
        'bankAccountNo2' => 'Account Number 2',
        'bankAccountNo3' => 'Account Number 3',
        'bankAccountNo_desc' => 'Enter your bank account number.<br>Example: 08018828282823',
        'bankName_desc' => 'Enter your bank name.<br>Example: Bank Riau, BTPN Jenius, Mandiri',
        'multiply' => 'Multiple',
        'multiply_desc' => 'Enter the number of multiples of the donation.<br>Example: 100000',
        'limit' => 'Donation Limit',
        'limit_desc' => 'Enter the maximum donation limit.',
        'CurrencySign' => 'Currency Symbol',
        'CurrencySign_desc' => 'Enter the currency symbol you are using.<br>Example: Rp., $, IDR, USD',
        'payment_price' => 'Price per 1 :coinName',
        'payment_price_desc' => 'Enter the price per 1 :coinName',
    ],
    'settings' => 'Configuration',
    'currency' => [
        '' => "-",
        'AUD' => "Australian Dollar",
        'BRL' => "Brazilian Real",
        'CAD' => "Canadian Dollar",
        'CZK' => "Czech Koruna",
        'DKK' => "Danish Krone",
        'EUR' => "Euro",
        'HKD' => "Hong Kong Dollar",
        'HUF' => "Hungarian Forint",
        'IDR' => "Indonesian Rupiah",
        'JPY' => "Japanese Yen",
        'MYR' => "Malaysian Ringgit",
        'MXN' => "Mexican Peso",
        'NOK' => "Norwegian Krone",
        'NZD' => "New Zealand Dollar",
        'PHP' => "Philippine Peso",
        'PLN' => "Polish Zloty",
        'GBP' => "Pound Sterling",
        'SGD' => "Singapore Dollar",
        'SEK' => "Swedish Krona",
        'CHF' => "Swiss Franc",
        'TWD' => "Taiwan New Dollar",
        'THB' => "Thai Baht",
        'TRY' => "Turkish Lira",
        'USD' => "U.S. Dollar",
    ]
];
