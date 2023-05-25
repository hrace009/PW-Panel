<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

return [
    'title' => 'Layanan',
    'view' => 'Ubah Layanan',
    'config' => 'Konfigurasi',
    'config_success' => 'Perubahan konfigurasi telah di simpan!',
    'enable' => 'Aktif',
    'disable' => 'Mati',
    'disabled' => 'Layanan ini tidak aktif!',
    'price' => 'Harga',
    'label' => [
        'broadcast' => 'Pesan siaran',
        'virtual_to_cubi' => config('pw-config.currency_name') . ' untuk cubi',
        'cultivation_change' => 'Ganti Wibawa',
        'gold_to_virtual' => 'Beli ' . config('pw-config.currency_name') . ' dengan gold',
        'level_up' => 'Naik Level',
        'max_meridian' => 'Tingkatkan Meredian',
        'reset_exp' => 'Setel Ulang EXP',
        'reset_sp' => 'Setel Ulang SP',
        'reset_stash_password' => 'Hapus Password Bank',
        'teleport' => 'Teleportasi'
    ],
    'desc' => [
        'broadcast' => 'Buat pengumuman di dalam game, layak nya chat GM!',
        'virtual_to_cubi' => 'Beli cubi menggunakan ' . config('pw-config.currency_name') . '.',
        'cultivation_change' => 'Ganti wibawa dari demon ke sage atau dari sage ke demon.',
        'gold_to_virtual' => 'Beli ' . config('pw-config.currency_name') . ' menggunakan gold di inventori.',
        'level_up' => 'Naikkan level karakter dengan cepat.',
        'max_meridian' => 'Maksimalkan meredian pada karakter.',
        'reset_exp' => 'Setel ulang EXP menjadi 0.',
        'reset_sp' => 'Setel ulang SP menjadi 0.',
        'reset_stash_password' => 'Hapus password banking.',
        'teleport' => 'Berpindah tempat ke titik awal, ini sangat berguna jika karakter nyangkut.'
    ],
    'teleport_world_tag' => 'World Tag',
    'teleport_x' => 'Koordinat X',
    'teleport_y' => 'Koordinat Y',
    'teleport_z' => 'Koordinat Z',
    'level_up' => 'Naik Level',
    'level_up_cap' => 'Level Maksimal',
    'teleport_character' => 'Teleport Karakter',
    'free' => 'Gratis',
    'logged_in' => 'Karakter harus online',
    'logged_out' => 'Karakter harus offline',
    'cultivation_unlocked' => 'Wibawa harus terbuka',
    'not_max_level' => 'Level karakter harus lebih rendah dari ' . config('pw-config.level_up_cap'),
    'level_40' => 'Karakter harus berada di level 40 keatas',
    'message' => 'Pesan',
    'quantity' => 'Jumlah',
    'must_login' => 'Karakter Anda harus login.',
    'must_logout' => 'Karakter Anda harus logout.',
    'cultivation_not_unlocked' => 'Karakter Anda harus sudah membuka wibawa.',
    'max_level' => 'Level karakter sudah maksimal.',
    'not_high_enough_level' => 'Karakter Anda tidak memiliki level yang cukup.',
    'meridian_maxed' => 'Meredian sudah maksimal.',
    'no_stash_password' => 'Karakter Anda tidak memiliki sandi bank.',
    'not_enough_gold' => 'Karakter Anda tidak memilik gold yang cukup.',
    'ingame_gold' => 'Gold Game',
    'requirements' => 'Persyaratan:',
    'ingame' => [
        'broadcast' => [
            'title' => 'Pesan Siaran',
            'description' => 'Buat pengumuman layak nya chat GM!',
            'requirements' => [
                0 => 'logged_in'
            ],
            'input' => [
                'name' => 'message',
                'type' => 'text',
                'placeholder' => 'message'
            ],
            'complete' => 'Pesan siaran Anda telah mengudara.',
        ],
        'virtual_to_cubi' => [
            'title' => config('pw-config.currency_name') . ' untuk Koin Item Mall',
            'description' => 'Tukarkan ' . config('pw-config.currency_name') . ' Menjadi cubi. ',
            'requirements' => [
                0 => 'logged_out'
            ],
            'input' => [
                'name' => 'quantity',
                'type' => 'number',
                'placeholder' => 'quantity'
            ],
            'complete' => 'Cubi Anda akan segera terkirim.',
        ],
        'cultivation_change' => [
            'title' => 'Ganti Wibawa',
            'description' => 'Ganti wibawa dari demon ke sage atau dari sage ke demon. ',
            'requirements' => [
                0 => 'logged_out',
                1 => 'cultivation_unlocked'
            ],
            'complete' => 'Wibawa Anda telah di ubah.',
        ],
        'gold_to_virtual' => [
            'title' => 'Tukar gold game menjadi ' . config('pw-config.currency_name'),
            'description' => 'Tukar gold di dalam game menjadi ' . config('pw-config.currency_name') . '. ',
            'requirements' => [
                0 => 'logged_out'
            ],
            'input' => [
                'name' => 'quantity',
                'type' => 'number',
                'placeholder' => 'quantity'
            ],
            'complete' => 'Anda menerima :quantity :currency'
        ],
        'level_up' => [
            'title' => 'Level Up',
            'description' => 'Cepat dan mudah meningkatkan level karakter Anda.',
            'requirements' => [
                0 => 'logged_out',
                1 => 'not_max_level'
            ],
            'input' => [
                'name' => 'quantity',
                'type' => 'number',
                'placeholder' => 'quantity'
            ],
            'complete' => 'Anda telah naik :quantity level.'
        ],
        'max_meridian' => [
            'title' => 'Peningkatan Meridian',
            'description' => 'Maksimal atribut meridian untuk karakter Anda.',
            'requirements' => [
                0 => 'logged_out',
                1 => 'level_40'
            ],
            'complete' => 'Meridian Anda sekarang sudah maksimal.'
        ],
        'reset_exp' => [
            'title' => 'Atur Ulang Experience',
            'description' => 'Menyetel ulang experience karakter Anda ke nol.',
            'requirements' => [
                0 => 'logged_out'
            ],
            'complete' => 'Expereince Anda telah disetel ulang.',
        ],
        'reset_sp' => [
            'title' => 'Setel Ulang Spirit',
            'description' => 'Mengatur ulang spirit karakter Anda ke nol.',
            'requirements' => [
                0 => 'logged_out'
            ],
            'complete' => 'Spirit Anda telah disetel ulang',
        ],
        'reset_stash_password' => [
            'title' => 'Setel Ulang Sandi Bank',
            'description' => 'Pulihkan akses ke bank Anda.',
            'requirements' => [
                0 => 'logged_out'
            ],
            'complete' => 'Kata sandi bank Anda telah dihapus.',
        ],
        'teleport' => [
            'title' => 'Teleportasi Karakter',
            'description' => 'Teleport karakter Anda jika Anda terjebak dalam game dan tidak bisa masuk ke dalam game.',
            'requirements' => [
                0 => 'logged_out'
            ],
            'complete' => 'Karakter Anda telah diteleportasi.',
        ],
    ],
    'no_service' => 'TIDAK ADA LAYANAN: Layanan :service tidak ada.'
];
