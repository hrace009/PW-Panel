<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | TopUp Language Lines
    |--------------------------------------------------------------------------
    */

    'title' => 'TopUp',
    'status' => 'Status',
    'sandbox' => 'Sandbox',
    'on' => 'On',
    'off' => 'Off',
    'paymentwall_title' => 'Paymentwall',
    'paymentwall_desc' => 'Move switch to the right for activating Paymentwall',
    'no_methods' => 'Donation methods haven\'t been setup yet, please contact an administrator.',
    'submit' => 'Send',
    'error' => [
        'title' => 'Error',
        'message' => 'Please enter the dollar amount you would like to TopUp <b>OR</b> the amount of :currency you would like to receive.',
        'minimum' => 'You can\'t TopUp less than :min.'
    ],
    'double_notice' => '<b>Notice:</b> Double donation is active!',
    'double_donation' => 'Double',
    'double_desc' => 'Make double TopUp to active.',
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
            4 => 'Change URL to <code class="dark:text-cyan-400">' . url(route('api.paymentwall')) . '</code>',
            5 => 'Set PINGBACK SIGNATURE VERSION to \'2\'',
            6 => 'Make sure server online when testing pingback from paymentwall.'
        ]
    ],
    'guide' => [
        'paymentwall' => [
            'title' => 'Reload :currency with Paymentwall',
            'guide' => 'Guide',
            'text1' => 'Fund from reload :currency will be used for server maintenance, paying internet bills, building rent, advertisement and buying tools and the latest file server. If you like this game, please help us to keep the finance stable, so we can keep serving you.',
        ],
        'bank' => [
            'title' => 'Reload :currency with Bank Transfer',
            'noData' => 'No bank holder data available, please contact Administrator!',
            'text1' => 'Donation is use for server maintenance and buying some tools to create a good update for you. To do donation, please follow guide bellow :',
            'text2' => 'Transfer amount of money to one of our bank account bellow.',
            'bankHolder' => 'Bank Account Holder Name : :name',
            'limit' => 'Donation limit: :sign :number',
            'price_coin' => '1 :coin = :sign:currency',
            'multiply' => 'Multiple :currencySign:number',
            'text3' => 'Then, full fill form bellow, and sit tight wait until GM refill your wallet balance.',
            'text4' => 'After GM fill your wallet balance, you can buy anything you like in the store.',
            'form' => [
                'fullname' => 'Full Name',
                'fullname_desc' => 'Make sure this name is the same name with your bank account (This field is autofill).',
                'banknum' => 'Bank Account Number',
                'banknum_desc' => 'Enter your bank account number.',
                'loginid' => 'Login ID',
                'loginid_desc' => 'Your login ID will autofill by system.',
                'email' => 'Email',
                'email_desc' => 'Your email will autofill by system',
                'phone' => 'Phone',
                'phone_desc' => 'Enter your valid phone number, this will required if something bad happen.',
                'type' => 'Payment Type',
                'type_desc' => 'Select your payment type.',
                'inet' => 'Internet Banking',
                'atm' => 'Automatic Teller Machine (ATM)',
                'cod' => 'Cash On Delivery',
                'bankname' => 'Transfer to',
                'bankname_desc' => 'Select transfer destination.',
                'other' => 'Other',
                'amount' => 'Amount',
                'amount_desc' => 'Choose the amount of money you send.',
                'success' => 'Your donation form has been sent to Game Master. Please wait until he / she approve your purchase.',
                'unfinish' => 'You still have unfinish transaction, please complete the previous transaction.'
            ],
            'email' => [
                'subject' => '[:bank] New transaction from :name',
                'greeting' => 'Please check my transaction bellow.'
            ]
        ]
    ],
    'bank' => [
        'caption' => 'Bank',
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
        'confirm' => 'Bank Confirm'
    ],
    'paypal' => [
        'title' => 'Paypal',
        'status' => 'Status',
        'status_desc' => 'Move switch to the right for activating paypal',
        'sandbox' => 'Sandbox',
        'sandbox_desc' => 'Move switch to active sandbox mode.',
        'double' => 'Double',
        'double_desc' => 'Active double donation.',
        'client_id' => 'Client ID',
        'client_id_desc' => 'Enter your client ID',
        'secret' => 'Secret Key',
        'secret_desc' => 'Enter your secret key',
        'currency' => 'Currency',
        'currency_desc' => 'Select your currency',
        'currency_per' => 'Currency per :currency',
        'currency_per_desc' => 'Enter amount :coin per :currency',
        'minimum' => 'Minimum $ Ammount',
        'maximum' => 'Maximal $ Ammount',
        'minimum_desc' => 'Minimum $ Topup',
        'maximum_desc' => 'Maximum $ Topup',
        'description' => ':amount :currency',
        'success' => 'Thank you for supporting our server, we appreciate your donation.',
        'amount' => 'Amount money you will pay.',
        'amount_receive' => 'Amount :currency you will receive.',
        'frontbonus' => 'Bonus: :vc% :currency with minimum buying :mingetbonus :money',
    ],
    'ipaymu' => [
        'title' => 'iPaymu',
        'status' => 'Status',
        'status_desc' => 'Move switch to the right for activating iPaymu',
        'sandbox' => 'Sandbox',
        'sandbox_desc' => 'Move switch to active sandbox mode.',
        'double' => 'Double',
        'double_desc' => 'Active double donation.',
        'va' => 'Virtual Account',
        'va_desc' => 'Enter your iPaymu Virtual Account',
        'apikey' => 'Api Key',
        'apikey_desc' => 'Enter your iPaymu Api Key',
        'currency_per' => ':coin per :currency',
        'currency_per_desc' => 'Enter amount :coin per :currency',
        'minimum' => 'Minimum amount',
        'minimum_desc' => 'Minimum amount',
        'maximum' => 'Maximal amount',
        'maximum_desc' => 'Maximal amount',
        'frontbonus' => 'Bonus: :vc% :currency with minimum buying :mingetbonus :currency',
        'bonusess' => 'Bonus (%)',
        'bonusess_desc' => 'Enter bonus in percent (%)',
        'mingetbonus' => 'Minimum Buying',
        'mingetbonus_desc' => 'Minimal buying amount :currency to get bonusess',
        'description' => ':amount :currency',
        'success' => 'Thank you for supporting our server, we appreciate your donation.',
        'amount' => 'Amount money you will pay.',
        'amount_receive' => 'Amount :currency you will receive.',
        'refid' => 'Reference ID Prefix',
        'refid_desc' => 'Enter your reference ID prefix, this will easy your management if you have multiple server with same gateway.',
        'error' => [
            'title' => 'Error',
            'message' => 'Please enter the money amount you would like to TopUp <b>OR</b> the amount of :currency you would like to receive.',
            'minimum' => 'You can\'t TopUp less than :min :currency.',
            'maximum' => 'You can\'t TopUp more than :max :currency.',
            'smalmax' => 'Maximum amount must be greater than minimal amount.'
        ],
        'desc_ipay' => 'Login: :loginid | Amount: :amount :currency | Pay: :pay IDR',
        'no_phone' => 'Please fill your phone number!',
        'route_desc' => 'URL Callback iPaymu, Please change in the first installation',
        'route' => 'Route'
    ],
    'history' => [
        'title' => 'Transaction History',
        'bank' => 'Bank',
        'ingame' => 'Ingame',
        'paymentwall' => 'Paymentwall',
        'store' => 'Store',
        'paypal' => 'Paypal',
        'ipaymu' => 'iPaymu',
        'table' => [
            'trid' => 'Tr. ID',
            'date' => 'Date',
            'details' => 'Details',
            'fullname' => 'Name',
            'loginid' => 'Login',
            'contact' => [
                'caption' => 'Contact',
                'email' => 'Email',
                'phone' => 'Phone',
            ],
            'bankname' => 'Destination',
            'banknum' => 'Bank Number',
            'amount' => 'Amount',
            'type' => 'Type',
            'status' => 'Status',
            'reason' => 'Remarks',
            'action' => 'Action',
            'change' => 'Make change for transaction id #:id',
            'Paymentwall' => [
                'no' => 'No.',
                'refid' => 'Transaction ID',
                'date' => 'Date',
                'userid' => 'User ID',
                'amount' => 'Amount',
                'status' => 'Status',
                'color' => [
                    'success' => 'Success',
                    'cs' => 'CS',
                    'failed' => 'Failed'
                ]
            ],
            'service' => [
                'id' => 'Tr ID',
                'services' => 'Services',
                'curr_type' => 'Currency Type',
                'price' => 'Amount',
                'date' => 'Date'
            ],
            'shop' => [
                'id' => 'Tr ID',
                'item_name' => 'Item Name',
                'price' => 'Amount(:currency)',
                'point' => 'Amount(:currency)',
                'date' => 'Date'
            ],
            'paypal' => [
                'trans_id' => 'Transaction Id',
                'amount' => 'Amount',
                'money' => 'Price',
                'created_at' => 'Created At'
            ],
            'ipaymu' => [
                'trans_id' => 'Trx ID',
                'date' => 'Date',
                'vc' => ':currency',
                'money' => 'Price',
                'status' => 'Status'
            ]
        ],
        'success' => 'Your change has been saved!',
        'accept' => 'Accept',
        'reject' => 'Reject',
        'pending' => 'Pending',
        'reason' => 'Leave a message to user for transaction id #:id',
        'change' => [
            'status' => 'Change payment status'
        ]
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
    ],
    'free' => 'Free',
    'empty' => 'You not made any transaction yet!',
    'sandboxActive' => '<strong>WARNING:</strong> Sandbox is Active!'
];
