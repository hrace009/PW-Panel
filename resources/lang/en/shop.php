<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Shop Language Lines
    |--------------------------------------------------------------------------
    */
    'title' => 'Shop',
    'all' => 'All',
    'general' => 'General',
    'equipment' => 'Equipment',
    'fashion' => 'Fashion',
    'accessories' => 'Accessories',
    'charms' => 'Charms',
    'buy' => 'Buy',
    'gift' => 'Gift',
    'send_gift' => 'Send Gift',
    'gift_title' => 'Send :name To:',
    'select_char_first' => 'You must first select a character to view your friends list.',
    'recently_added_friends' => 'If you\'ve recently added a friend and don\'t see them on the list, please re-log in-game.',
    'not_logged_in' => 'You need to be logged in to purchase this item.',
    'no_friends' => 'It seems that your friends list is empty.',
    'purchase_complete' => 'You\'ve successfully purchased :name.',
    'gift_complete' => 'You\'ve successfully sent :name to :count friends.',
    'mail_item' => [
        'title' => ':name Web Shop',
        'message' => "You received:\r:name x:count\r\r\rThank You,\r:staff Team",
    ],
    'gift_item' => [
        'title' => 'You Received a Gift',
        'message' => "You received:\r:name x:count\r\r\rFrom :player",
    ],
    'masks' => [
        0 => 'Other',
        1 => 'Weapons',
        'armor' => [
            2 => 'Helmet',
            16 => 'Chest',
            64 => 'Leg',
            128 => 'Feet',
            256 => 'Arms',
            8 => 'Robe',
            1073741826 => 'Red Helmet',
            1073741832 => 'Red Robe',
        ],
        'fashion' => [
            8192 => 'Chest',
            16384 => 'Leg',
            32768 => 'Feet',
            65536 => 'Arms',
            33554432 => 'Hair',
            536870912 => 'Weapon',
        ],
        'accessories' => [
            1536 => 'Ring',
            4 => 'Necklace',
            32 => 'Belt',
        ],
        'charms' => [
            1048576 => 'HP',
            2097152 => 'MP',
        ],
        2048 => 'Ammunition',
        4096 => 'Flying Mount',
        131072 => 'Hierogram',
        262144 => 'Heaven Book/Tome',
        524288 => 'Chat Smiley',
        8388608 => 'Genie',
        2147483711 => 'War Avatar',
    ],

    'fields' => [
        'name' => 'Name',
        'name_desc' => 'Enter item name.',
        'icon' => 'Icon',
        'icon_desc' => 'Upload item icon.',
        'image' => 'Image',
        'image_desc' => 'Upload item image preview.',
        'price' => 'Price (:currency)',
        'price_desc' => 'Enter item price in :currency.',
        'item_id' => 'Item ID',
        'item_id_desc' => 'Enter item ID from elements.data.',
        'octet' => 'Octets',
        'octet_desc' => 'Enter item octets.',
        'mask' => 'Mask',
        'mask_desc' => 'Select mask type base on elements.data.',
        'count' => 'Count',
        'count_desc' => 'Enter amount of item.',
        'max_count' => 'Max Count',
        'max_count_desc' => 'Enter max amount of item.',
        'protection_type' => 'Protection type',
        'protection_type_desc' => 'Enter protection type.',
        'expire_date' => 'Expire Date',
        'expire_date_desc' => 'Enter item expired date.',
        'discount' => 'Discount',
        'discount_desc' => 'Enter discount in percent (%).',
        'total' => 'Total',
        'shareable' => [
            'title' => 'Shareable',
            'yes' => 'Yes',
            'yes_desc' => 'Select here if this item can share to other account.',
            'no' => 'No',
            'no_desc' => 'Select here if this item can\'t share to other account.',
        ],
        'description' => 'Description'
    ],

    'index' => 'Viewing Items',
    'add' => 'Add Item',
    'edit' => 'Edit',
    'view' => 'View Items',
    'delete' => 'Delete',
    'create' => 'Create New Item',
    'create_success' => 'Your item has been created!',
    'edit_success' => 'Your changes have been saved!',
    'add_button' => 'Create Item',
    'update_button' => 'Update Item',
    'items_per_page' => 'Items Per Page',
    'destroy' => 'Item delete!',
    'items_per_page_desc' => 'The number of items to display per page.',
    'missing' => [
        'title' => 'Missing Icon',
        'body' => 'To fix this, upload <b>:id.gif</b> to <b>:path</b>.'
    ],
    'empty' => [
        'noItem' => 'No item to sell here! ',
        'pleaseSell' => 'Please create item to sell!',
    ],
    'configuration' => 'Configuration',
    'listFriend' => 'List friend for :character',

    'times_bought' => 'Times Bought'

];
