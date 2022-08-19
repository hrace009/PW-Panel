<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Shop Language Lines
    |--------------------------------------------------------------------------
    */
    'title' => 'Toko',
    'all' => 'Semua',
    'general' => 'Umum',
    'equipment' => 'Peralatan',
    'fashion' => 'Mode',
    'accessories' => 'Aksesoris',
    'charms' => 'Charms',
    'buy' => 'Beli',
    'gift' => 'Hadiah',
    'send_gift' => 'Mengirim hadiah',
    'gift_title' => 'Kirim :name Ke:',
    'select_char_first' => 'Anda harus terlebih dahulu memilih karakter untuk melihat daftar teman Anda.',
    'recently_added_friends' => 'Jika Anda baru saja menambahkan teman dan tidak melihatnya di daftar, silakan masuk kembali ke dalam game.',
    'not_logged_in' => 'Anda harus masuk untuk membeli item ini.',
    'no_friends' => 'Sepertinya daftar temanmu kosong.',
    'purchase_complete' => 'Anda berhasil membeli :name.',
    'gift_complete' => 'Anda telah berhasil mengirim :name kepada :count teman.',
    'mail_item' => [
        'title' => ':name Toko Web',
        'message' => "Anda telah menerima:\r:name x:count\r\r\rTerima kasih,\r:staff Tim",
    ],
    'gift_item' => [
        'title' => 'Anda Menerima Hadiah',
        'message' => 'Anda telah menerima:\r:name x:count\r\r\rDari :player',
    ],
    'masks' => [
        0 => 'Lainnya',
        1 => 'Senjata',
        'armor' => [
            2 => 'Helm',
            16 => 'Baju',
            64 => 'Celana',
            128 => 'Sepatu',
            256 => 'Sarung Tangan',
            8 => 'Jubah',
            1073741826 => 'Helm Merah',
            1073741832 => 'Jubah Merah',
        ],
        'fashion' => [
            8192 => 'Baju',
            16384 => 'Celana',
            32768 => 'Sepatu',
            65536 => 'Sarung Tangan',
            33554432 => 'Rambut',
            536870912 => 'Senjata',
        ],
        'accessories' => [
            1536 => 'Cincin',
            4 => 'Kalung',
            32 => 'Sabuk',
        ],
        'charms' => [
            1048576 => 'HP',
            2097152 => 'MP',
        ],
        2048 => 'Amunisi',
        4096 => 'Alat terbang',
        131072 => 'Hierogram',
        262144 => 'Heaven Book/Tome',
        524288 => 'Obrolan Emot',
        8388608 => 'Pixie',
        2147483711 => 'War Avatar',
    ],

    'fields' => [
        'name' => 'Nama',
        'name_desc' => 'Masukkan nama barang.',
        'icon' => 'Ikon',
        'icon_desc' => 'Unggah ikon item.',
        'image' => 'Gambar',
        'image_desc' => 'Unggah pratinjau gambar item.',
        'price' => 'Harga (:currency)',
        'price_desc' => 'Masukkan harga barang dalam :currency.',
        'item_id' => 'ID barang',
        'item_id_desc' => 'Masukkan ID item dari elements.data.',
        'octet' => 'Oktet',
        'octet_desc' => 'Masukkan oktet item.',
        'mask' => 'Mask',
        'mask_desc' => 'Pilih jenis mask berdasarkan elements.data.',
        'count' => 'Jumlah',
        'count_desc' => 'Masukkan jumlah barang.',
        'max_count' => 'Jumlah Maks',
        'max_count_desc' => 'Masukkan jumlah maksimum item.',
        'protection_type' => 'Jenis proc type',
        'protection_type_desc' => 'Masukkan jenis perlindungan.',
        'expire_date' => 'Tanggal kadaluarsa',
        'expire_date_desc' => 'Masukkan tanggal kadaluarsa barang.',
        'discount' => 'Diskon',
        'discount_desc' => 'Masukkan diskon dalam persen (%).',
        'total' => 'Total',
        'shareable' => [
            'title' => 'Dapat dibagikan',
            'yes' => 'Ya',
            'yes_desc' => 'Pilih di sini jika item ini dapat dibagikan ke akun lain.',
            'no' => 'Tidak',
            'no_desc' => 'Pilih di sini jika item ini tidak dapat dibagikan ke akun lain.',
        ],
        'description' => 'Keterangan'
    ],

    'index' => 'Melihat Item',
    'add' => 'Tambahkan Barang',
    'edit' => 'Sunting',
    'view' => 'Lihat Item',
    'delete' => 'Hapus',
    'create' => 'Buat Item Baru',
    'create_success' => 'Item Anda telah dibuat!',
    'edit_success' => 'Perubahan yang Anda buat sudah disimpan!',
    'add_button' => 'Buat Barang',
    'update_button' => 'Perbarui Barang',
    'items_per_page' => 'Item per halaman',
    'destroy' => 'Item dihapus!',
    'items_per_page_desc' => 'Jumlah item yang di tampilkan per halaman.',
    'missing' => [
        'title' => 'Ikon Hilang',
        'body' => 'Untuk memperbaikinya, unggah <b>:id.gif</b> ke <b>:path</b>.'
    ],
    'empty' => [
        'noItem' => 'Tidak ada barang untuk dijual di sini! ',
        'pleaseSell' => 'Silakan buat item untuk dijual!',
    ],
    'configuration' => 'Konfigurasi',
    'listFriend' => 'Daftar teman untuk :character',

    'times_bought' => 'Penjualan'

];
