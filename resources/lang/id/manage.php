<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

return [
    'title' => 'Manajemen',
    'broadcast' => 'Siaran',
    'mailer' => 'Surat Menyurat',
    'forbid' => 'Melarang',
    'gm' => 'Kelola GM',
    'chat' => 'Obrolan Langsung',
    'watch' => 'Menyaksikan',
    'loading' => 'Memuat...',

    'edit_gm' => 'Mengubah Izin :user',
    'change_permissions' => 'Ubah Izin',
    'gm_permissions' => [
        0 => 'Ganti nama dan ID pemain',
        1 => 'Berubah menjadi tersembunyi atau kebal',
        2 => 'Ganti status daring',
        3 => 'Sembunyikan status online di wisper',
        4 => 'Teleportasi ke pemain',
        5 => 'Teleport pemain ke GM',
        6 => 'Teleportasi dengan ctrl+klik peta',
        11 => 'Tampilkan jumlah online',
        100 => 'Ban akun/karakter pemain',
        101 => 'Bisukan akun/karakter pemain',
        102 => 'Larangan perdagangan untuk pemain',
        103 => 'Larangan menjual untuk pemain',
        104 => 'Siaran pengumuman GM',
        105 => 'Mulai ulang server game',
        200 => 'Buat Monster',
        206 => 'Aktifkan Pencipta Monster',
    ],

    'table' => [
        'gm' => [
            'id' => 'ID',
            'name' => 'Nama',
            'actions' => 'Aksi'
        ],
        'chat' => [
            'date' => 'Tanggal',
            'user_id' => 'ID Pengguna',
            'channel' => 'Saluran',
            'destination' => 'Tujuan',
            'message' => 'Pesan'
        ]
    ],

    'fields' => [
        'broadcast' => [
            'user' => 'ID Karakter',
            'user_desc' => 'Karakter yang akan mengirim pesan (optional)',
            'channel' => 'Saluran',
            'channel_desc' => 'Pilih saluran siaran Anda.',
            'message' => 'Pesan',
            'message_desc' => 'Masukan pesan.',
        ],
        'mailer' => [
            'type' => 'Berikan kepada',
            'types' => [
                'list' => 'Daftar pemain',
                'all' => 'Semua pemain',
                'online' => 'Semua pemain yang sedang online'
            ],
            'roles' => 'ID karakter',
            'roles_desc' => 'pisahkan dengan koma (,)',
            'item_id' => 'ID Barang',
            'quantity' => 'Jumlah',
            'protection_type' => 'Tipe kunci',
            'time_limit' => 'Batas waktu',
            'octet' => 'Octet',
            'mask' => 'Mask',
            'gold' => 'Gold',
            'subject' => 'Subjek',
            'message' => 'Pesan'
        ],
        'forbid' => [
            'types' => [
                'ban_acc' => 'Blokir Akun',
                'ban_char' => 'Blokir Karakter',
                'mute_acc' => 'Mute Akun',
                'mute_char' => 'Mute Karakter'
            ],
            'type' => 'Tipe',
            'user_id' => 'ID User',
            'user_id_desc' => 'Akun atau ID Karakter',
            'length' => 'Durasi',
            'length_desc' => 'Dalam detik',
            'reason' => 'Alasan',
            'reason_desc' => 'Masukkan alasan kenapa Anda menghukum akun atau karakter ini.'
        ],
        'gm' => [
            'account_id' => 'ID Akun',
            'account_id_desc' => 'Masukkan ID Akun yang akan menjadi GM, Pastikan anda mempercayai orang tersebut.'
        ],
        'chat' => [
            'path' => 'Log Folder Path',
            'path_desc' => 'Path folder dimana file <b>world2.chat</b> berada.'
        ]
    ],
    'submit' => [
        'broadcast' => 'Kirim Pesan',
        'mailer' => 'Kirim Surat',
        'forbid' => 'Submit',
        'gm' => [
            'add' => 'Tambah GM',
            'save' => 'Simpan Izin',
            'destroy' => 'Hapus GM'
        ]
    ],
    'error' => [
        'gm' => [
            'no_user' => 'Akun :acc tidak ada dalam database.',
            'already_gm' => 'Akun :acc adalah GM.',
        ]
    ],
    'complete' => [
        'broadcast' => 'Pesan Anda telah dikirim!',
        'mailer' => [
            'list' => 'Surat telah dikirim ke daftar pemain!',
            'all' => 'Surat telah dikirim ke semua pemain!',
            'online' => 'Surat telah dikirim ke semua pemain yang sedang online!'
        ],
        'forbid' => [
            'ban' => [
                'account' => 'Akun :user di blokir untuk :seconds detik!',
                'character' => 'Karakter :user di blokir untuk :seconds detik!'
            ],
            'mute' => [
                'account' => 'Akun :user di mute untuk :seconds detik!',
                'character' => 'Karakter :user di mute untuk :seconds detik!'
            ]
        ],
        'gm' => [
            'add' => 'Akun :acc sekarang sudah memiliki akses GM!',
            'edit' => 'Izin akun :acc telah di ubah!',
            'remove' => 'Akses GM akun :acc telah di cabut!',
        ]
    ],

    'buttons' => [
        'refresh' => 'Segarkan'
    ],

    'channels' => [
        0 => 'Umum',
        1 => 'TOA',
        2 => 'Grup',
        3 => 'Guild',
        4 => 'Bisik',
        7 => 'Dagang',
        9 => 'Siaran',
        12 => 'Horn'
    ],
    'faction_id' => 'ID Faksi: ',
];
