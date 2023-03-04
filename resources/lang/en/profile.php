<?php

return [
    'info' => [
        'title' => 'Profile Information',
        'description' => 'Update your account\'s profile information and email address.'
    ],
    'photo' => [
        'selectnew' => 'Select A New Photo',
        'remove' => 'Remove Photo'
    ],
    'password' => [
        'title' => 'Update Password',
        'description' => 'Ensure your account is using a long, random password to stay secure.',
        'current' => 'Current Password',
        'new' => 'New Password',
        'confirm' => 'Confirm Password',
        'desc' => 'For your security, please confirm your password to continue.',
        'ok' => 'Confirm',
        'Cancel' => 'Batal'
    ],
    '2fauth' => [
        'title' => 'Two Factor Authentication',
        'description' => 'Add additional security to your account using two factor authentication.',
        'enabled' => 'You have enabled two factor authentication.',
        'disabled' => 'You have not enabled two factor authentication.',
        'desc' => [
            'disabled' => 'When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone\'s Google Authenticator application.',
            'enabled' => 'Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application.',
        ],
        'showcode' => 'Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.',
        'active' => 'Enable',
        'notactive' => 'Disable',
        'regenerate' => 'Regenerate Recovery Codes',
        'showreccode' => 'Show Recovery Codes',
    ]
];
