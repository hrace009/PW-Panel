<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

return [
    'loading' => 'Memuat...',
    'home' => 'Beranda',
    'dashboard' => [
        'profile' => [
            'header' => 'Profil',
            'charList' => [
                'title' => 'Karakter saya',
                'id' => 'ID: :n',
                'description' => 'Daftar karakter Anda di akun ini.'
            ],
            'updatePin' => [
                'title' => 'Perbarui Pin',
                'description' => 'Pastikan akun Anda menggunakan pin acak agar tetap aman.',
                'current' => 'PIN sekarang',
                'new' => 'Pin baru',
                'confirm' => 'Konfirmasi Pin',
                'error' => 'Pin yang diberikan tidak cocok dengan pin Anda saat ini.'
            ],
        ],
    ],
    'character' => [
        'success' => 'Anda telah berhasil memilih karakter.',
        'error' => [
            'role' => 'Tidak bisa mendapatkan karakter.',
            'list' => 'Kami tidak dapat mengambil karakter Anda, coba lagi nanti.',
            'not_selected' => 'Anda harus memilih karakter sebelum melanjutkan.'
        ],
        'select' => 'Pilih Karakter',
    ],
    'menu' => [
        'dashboard' => 'Dasbor',
        'shop' => 'Toko',
        'donate' => [
            'bank' => 'Transfer Bank Manual',
            'history' => 'Riwayat Transaksi',
            'paymentwall' => 'Paymentwall',
            'paypal' => 'Paypal'
        ],
        'vote' => 'Voting',
        'voucher' => 'Kupon',
        'services' => 'Layanan Dalam Game',
        'ranking' => [
            'title' => 'Peringkat',
            'players' => 'Peringkat Pemain',
            'faction' => 'Peringkat Fraksi'
        ]
    ],
    'saved' => 'Disimpan.',
    'Save' => 'Simpan',
    'delete' => 'Hapus',
    'update' => 'Perbarui',
    'serverOffline' => 'Server tidak online, harap coba lagi nanti.',
    'language' => 'Bahasa',
    'logout' => 'Keluar',
    'adminArea' => 'Area Admin',
    'memberArea' => 'Area Anggota',
    'balance' => 'Saldo',
    'config_save_desc' => 'Simpan konfigurasi.',
    'cron' => [
        'add' => 'Otomatiskan Panel Anda',
        'info' => 'Menambahkan tugas cron ini akan mengotomatiskan transfer voting dan pembaruan peringkat.',
        'job' => '* * * * * php ' . base_path('artisan') . ' schedule:run >> /dev/null 2>&1'
    ],
    'not_enough' => 'Anda tidak punya cukup :currency.',
    'not_enough_gold' => 'Anda tidak memiliki cukup Gold.',
    'restricted' => 'Area terbatas!',
    'buy' => 'Beli',
    /* Class Names */
    'classes' => [
        0 => 'Warrior',
        1 => 'Mage',
        2 => 'Psychic',
        3 => 'Fox Lady',
        4 => 'Beastial',
        5 => 'Assassin',
        6 => 'Archer',
        7 => 'Priest',
        8 => 'Seeker',
        9 => 'Mystic',
        10 => 'Duskblade',
        11 => 'Stormbringer'
    ],
];
