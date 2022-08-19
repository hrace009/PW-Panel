<?php


return [

    /*
    |--------------------------------------------------------------------------
    | Members Language Lines
    |--------------------------------------------------------------------------
    */
    'title' => 'Anggota',
    'manage' => 'Manajemen Anggota',
    'success' => 'Akun :user menerima :count :currency',
    'table' => [
        'id' => 'ID',
        'name' => 'Nama',
        'email' => 'Email',
        'truename' => 'Nama Lengkap',
        'balance' => 'Saldo',
        'role' => 'Peran',
        'actions' => 'Aksi'
    ],
    'search' => 'Mencari untuk pengguna...',
    'empty' => 'Masukkan kata kunci untuk mencari anggota.',
    'notfound' => 'Tidak ada hasil yang cocok.',
    'modal' => [
        'title' => 'Berikan :currency Kepada: :user',
        'close' => 'Tutup',
        'submit' => 'Submit'
    ],
    'actions' => [
        'give' => 'Berikan :currency kepada',
        'to' => 'Kepada',
        'add' => config('pw-config.currency_name') . ' di tambah kan',
        'resetPass' => 'Setel ulang paksa password dan pin untuk:',
        'enterNewPass' => 'Masukkan password baru',
        'resetPassPin' => 'Atur ulang password dan PIN',
        'confirm' => 'Saya konfirmasi aksi ini!',
        'note' => 'Catatan',
        'noteCaption' => 'Password baru dan PIN baru akaun di kirim ke alamat email pengguna.',
        'PassPinReset' => 'Berhasil!, mohon informasikan kepada pengguna untuk memeriksa email nya.',
        'mustConfirm' => 'Gagal!, Mohon konfirmasi aksi Anda!',
        'email' => 'Masukkan email baru',
        'changeEmail' => 'Ganti email untuk:',
        'btnChEmail' => 'Ganti Email!',
        'successEMail' => 'Email telah diganti!'
    ],
    'fields' => [
        'amount' => [
            'label' => 'Jumlah yang akan di berikan',
        ],
        'search' => [
            'placeholder' => 'Mencari...'
        ]
    ],
    'ajax' => [
        'title' => 'Berikan :currency kepada'
    ],
];
