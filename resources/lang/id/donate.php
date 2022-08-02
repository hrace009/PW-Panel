<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Donate Language Lines
    |--------------------------------------------------------------------------
    */

    'title' => 'Donasi',
    'status' => 'Status',
    'on' => 'Aktif',
    'off' => 'Tidak Aktif',
    'paymentwall_title' => 'Paymentwall',
    'paymentwall_desc' => 'Pindahkan sakelar ke kanan untuk mengaktifkan Paymentwall',
    'no_methods' => 'Metode donasi belum disiapkan, harap hubungi administrator.',
    'submit' => 'Kirim',
    'error' => [
        'title' => 'Kesalahan',
        'message' => 'Silakan masukkan jumlah dolar yang ingin Anda bayar <b>OR</b> jumlah :currency yang akan anda terima.',
        'minimum' => 'Anda tidak dapat donate kurang dari :min.'
    ],
    'double_notice' => '<b>Catatan:</b> Double donate active!',
    'double_donation' => 'Dobel',
    'double_desc' => 'Lakukan donasi ganda untuk aktif.',
    'paymentwall_link' => 'Kode Widget',
    'paymentwall_link_desc' => 'Masukkan kode widget Paymentwall Anda.',
    'paymentwall_widget_width' => 'Lebar Widget',
    'paymentwall_widget_width_desc' => 'Masukkan lebar dalam piksel.',
    'paymentwall_widget_high' => 'Widget Tinggi',
    'paymentwall_widget_high_desc' => 'Masukkan piksel tinggi.',
    'paymentwall_key' => 'Secret Key',
    'paymentwall_key_desc' => 'Enter your paymentwall Secret Key.',
    'paymentwall_project_key' => 'Project Key',
    'paymentwall_project_key_desc' => 'Masukkan project key paymentwall.',
    'paymentwall_preview' => 'Pratinjau',
    'paymentwall_setup' => [
        'title' => 'Cara Mengatur Paymentwall',
        'steps' => [
            1 => 'Masuk ke Paymentwall akun pedagang.',
            2 => 'Pergi ke My Projects > Settings',
            3 => 'Ubah jenis pingback menjadi URL',
            4 => 'Ubah URL menjadi <code class="dark:text-cyan-400">' . url(config('pw-config.payment.paymentwall.pingback_path')) . '</code>',
            5 => 'Atur PINGBACK SIGNATURE VERSION ke \'2\''
        ]
    ],
    'guide' => [
        'paymentwall' => [
            'title' => 'Isi ulang :currency dengan Paymentwall',
            'guide' => 'Panduan',
            'text1' => 'Dana dari isi ulang :currency akan digunakan untuk perawatan server, pembayaran tagihan internet, sewa gedung, iklan dan pembelian alat dan file server terbaru. Jika Anda menyukai permainan ini, tolong bantu kami untuk menjaga keuangan tetap stabil, sehingga kami dapat terus melayani Anda.',
        ],
        'bank' => [
            'title' => 'Isi ulang :currency dengan Transfer Bank',
            'noData' => 'Tidak ada data pemegang bank yang tersedia, silakan hubungi Administrator!',
            'text1' => 'Donasi digunakan untuk pemeliharaan server dan membeli beberapa alat untuk membuat pembaruan yang baik untuk Anda. Untuk melakukan donasi, silakan ikuti panduan di bawah ini :',
            'text2' => 'Transfer sejumlah uang ke salah satu rekening bank kami di bawah ini.',
            'bankHolder' => 'Nama Pemilik Rekening Bank : :name',
            'limit' => 'Batas donasi: :sign :number',
            'price_coin' => '1 :coin = :sign:currency',
            'multiply' => 'Kelipatan :currencySign:number',
            'text3' => 'Kemudian, isi formulir lengkap di bawah ini, dan tunggu sampai GM mengisi ulang saldo dompet Anda.',
            'text4' => 'Setelah GM mengisi saldo dompet Anda, Anda dapat membeli apa pun yang Anda suka di toko.',
            'form' => [
                'fullname' => 'Nama lengkap',
                'fullname_desc' => 'Pastikan nama ini adalah nama yang sama dengan rekening bank Anda (Bidang ini adalah isi otomatis).',
                'banknum' => 'Nomor rekening bank',
                'banknum_desc' => 'Masukkan nomor rekening bank Anda.',
                'loginid' => 'ID login',
                'loginid_desc' => 'ID login Anda akan diisi otomatis oleh sistem.',
                'email' => 'Email',
                'email_desc' => 'Email Anda akan otomatis terisi oleh sistem',
                'phone' => 'Telepon',
                'phone_desc' => 'Masukkan nomor telepon Anda yang valid, ini akan diperlukan jika sesuatu yang buruk terjadi.',
                'type' => 'Tipe pembayaran',
                'type_desc' => 'Pilih jenis pembayaran Anda.',
                'inet' => 'Internet Banking',
                'atm' => 'Automatic Teller Machine (ATM)',
                'cod' => 'Bayar di tempat',
                'bankname' => 'Transfer ke',
                'bankname_desc' => 'Pilih tujuan transfer.',
                'other' => 'Lainnya',
                'amount' => 'Jumlah',
                'amount_desc' => 'Pilih jumlah uang yang Anda kirim.',
                'success' => 'Formulir donasi Anda telah dikirim ke Game Master. Harap tunggu sampai dia menyetujui pembelian Anda.',
                'unfinish' => 'Anda masih memiliki transaksi yang belum selesai, harap selesaikan transaksi sebelumnya.'
            ],
            'email' => [
                'subject' => '[:bank] Transaksi baru dari :name',
                'greeting' => 'Silakan periksa transaksi saya di bawah ini.'
            ]
        ]
    ],
    'bank' => [
        'caption' => 'Bank',
        'title' => 'Transfer Bank Manual',
        'status' => 'Status',
        'status_desc' => 'Pindahkan sakelar ke kanan untuk mengaktifkan Transfer Bank Manual',
        'double_desc' => 'Pindahkan sakelar ke kanan untuk mengaktifkan Donasi ganda.',
        'owner' => 'Pemilik',
        'owner_desc' => 'Masukkan nama pemilik rekening bank Anda.',
        'bankName1' => 'Bank 1',
        'bankName2' => 'Bank 2',
        'bankName3' => 'Bank 3',
        'bankAccountNo1' => 'Nomor akun 1',
        'bankAccountNo2' => 'Nomor akun 2',
        'bankAccountNo3' => 'Nomor akun 3',
        'bankAccountNo_desc' => 'Masukkan nomor rekening bank Anda.<br>Contoh: 08018828282823',
        'bankName_desc' => 'Enter your bank name.<br>Example: Bank Riau, BTPN Jenius, Mandiri',
        'multiply' => 'Kelipatan',
        'multiply_desc' => 'Masukkan jumlah kelipatan donasi.<br>Contoh: 100000',
        'limit' => 'Batas Donasi',
        'limit_desc' => 'Masukkan batas donasi maksimum.',
        'CurrencySign' => 'Simbol Mata Uang',
        'CurrencySign_desc' => 'Emasukkan simbol mata uang yang Anda gunakan.<br>Contoh: Rp., $, IDR, USD',
        'payment_price' => 'Harga per 1 :coinName',
        'payment_price_desc' => 'Masukkan harga per 1 :coinName',
        'confirm' => 'Konfirmasi Bank'
    ],
    'paypal' => [
        'title' => 'Paypal',
        'status' => 'Status',
        'status_desc' => 'Pindahkan sakelar ke kanan untuk mengaktifkan paypal',
        'double' => 'Dobel',
        'double_desc' => 'Donasi ganda aktif.',
        'client_id' => 'ID Klien',
        'client_id_desc' => 'Masukkan ID klien Anda',
        'secret' => 'Secret Key',
        'secret_desc' => 'Masukkan secret key',
        'currency' => 'Mata uang',
        'currency_desc' => 'Pilih mata uang Anda',
        'currency_per' => 'Currency per :currency',
        'currency_per_desc' => 'Masukan jumlah :coin per :currency',
        'minimum' => 'Jumlah minimal',
        'minimum_desc' => 'Jumlah minimum untuk disumbangkan'
    ],
    'history' => [
        'title' => 'sejarah transaksi',
        'bank' => 'Bank',
        'ingame' => 'Dalam Game',
        'paymentwall' => 'Paymentwall',
        'store' => 'Toko',
        'table' => [
            'trid' => 'Tr. ID',
            'date' => 'Tanggal',
            'details' => 'Detil',
            'fullname' => 'Nama',
            'loginid' => 'Login',
            'contact' => [
                'caption' => 'Kontak',
                'email' => 'Email',
                'phone' => 'Telepon',
            ],
            'bankname' => 'Tujuan',
            'banknum' => 'Nomor Bank',
            'amount' => 'Jumlah',
            'type' => 'Jenis',
            'status' => 'Status',
            'reason' => 'Catatan',
            'action' => 'Tindakan',
            'change' => 'Lakukan perubahan untuk id transaksi #:id',
            'Paymentwall' => [
                'no' => 'No.',
                'refid' => 'Transaksi ID',
                'date' => 'Tanggal',
                'userid' => 'ID pengguna',
                'amount' => 'Jumlah',
                'status' => 'Status',
                'color' => [
                    'success' => 'Sukses',
                    'cs' => 'CS',
                    'failed' => 'Gagal'
                ]
            ],
            'service' => [
                'id' => 'Tr ID',
                'services' => 'Jasa',
                'curr_type' => 'Jenis mata uang',
                'price' => 'Jumlah',
                'date' => 'Tanggal'
            ],
            'shop' => [
                'id' => 'Tr ID',
                'item_name' => 'Nama Item',
                'price' => 'Jumlah',
                'date' => 'Tanggal'
            ]
        ],
        'success' => 'Perubahan Anda telah disimpan!',
        'accept' => 'Diterima',
        'reject' => 'Ditolak',
        'pending' => 'Menunggu',
        'reason' => 'Tinggalkan pesan kepada pengguna untuk id transaksi #:id',
        'change' => [
            'status' => 'Ubah status pembayaran'
        ]
    ],
    'settings' => 'Konfigurasi',
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
    'free' => 'Gratis',
    'empty' => 'Anda belum melakukan transaksi apa pun!'
];
