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
    'on' => 'Aktif',
    'off' => 'Tidak Aktif',
    'paymentwall_title' => 'Paymentwall',
    'paymentwall_desc' => 'Pindahkan sakelar ke kanan untuk mengaktifkan Paymentwall',
    'no_methods' => 'Metode donasi belum disiapkan, harap hubungi administrator.',
    'submit' => 'Kirim',
    'error' => [
        'title' => 'Kesalahan',
        'message' => 'Silakan masukkan jumlah dolar yang ingin Anda bayar <b>OR</b> jumlah :currency yang akan anda terima.',
        'minimum' => 'Anda tidak dapat melakukan TopUp kurang dari :min.'
    ],
    'double_notice' => '<b>Catatan:</b> Double TopUp active!',
    'double_donation' => 'Dobel',
    'double_desc' => 'Lakukan TopUp ganda untuk aktif.',
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
            4 => 'Ubah URL menjadi <code class="dark:text-cyan-400">' . url(route('api.paymentwall')) . '</code>',
            5 => 'Atur PINGBACK SIGNATURE VERSION ke \'2\'',
            6 => 'Pastikan server pw dalam keadaan online ketika melakukan test pingback dari server paymentwall.'
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
            'text1' => 'Dana TopUp digunakan untuk pemeliharaan server dan membeli beberapa alat untuk membuat pembaruan yang baik untuk Anda. Untuk melakukan donasi, silakan ikuti panduan di bawah ini :',
            'text2' => 'Transfer sejumlah uang ke salah satu rekening bank kami di bawah ini.',
            'bankHolder' => 'Nama Pemilik Rekening Bank : :name',
            'limit' => 'Batas TopUp: :sign :number',
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
                'success' => 'Formulir TopUp Anda telah dikirim ke Game Master. Harap tunggu sampai dia menyetujui pembelian Anda.',
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
        'sandbox' => 'Sandbox',
        'sandbox_desc' => 'Pindahkan sakelar ke kanan untuk mengaktifkan sandbox mode.',
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
        'minimum' => 'Jumlah minimal $',
        'maximum' => 'Jumlah maximal $',
        'minimum_desc' => 'Jumlah minimum $ untuk topup',
        'maximum_desc' => 'Jumlah maximal $ untuk topup',
        'description' => ':amount :currency',
        'success' => 'Terima kasih telah mendukung server kami, kami sangat menghargai donasi Anda.',
        'amount' => 'Jumlah yang dibayarkan.',
        'amount_receive' => 'Jumlah :currency yang akan diterima.',
        'frontbonus' => 'Bonus: :vc% :currency dengan minimal pembelian :mingetbonus :money',
    ],
    'ipaymu' => [
        'title' => 'iPaymu',
        'status' => 'Status',
        'status_desc' => 'Geser tombol ke kanan untuk mengaktifkan iPaymu',
        'sandbox' => 'Sandbox',
        'sandbox_desc' => 'Pindahkan sakelar ke mode kotak pasir aktif.',
        'double' => 'Dobel',
        'double_desc' => 'Donasi ganda aktif.',
        'va' => 'Akun Virtual',
        'va_desc' => 'Masukkan Akun Virtual iPaymu Anda',
        'apikey' => 'Api Key',
        'apikey_desc' => 'Masukkan api Key iPaymu Anda',
        'currency_per' => ':coin per :currency',
        'currency_per_desc' => 'Masukan jumlah :coin per :currency',
        'minimum' => 'Jumlah minimal',
        'minimum_desc' => 'Jumlah minimum',
        'maximum' => 'Jumlah maksimal',
        'maximum_desc' => 'Jumlah maksimal',
        'frontbonus' => 'Bonus: :vc% :currency dengan minimal pembelian :mingetbonus :currency',
        'bonusess' => 'Bonus (%)',
        'bonusess_desc' => 'Masukkan jumlah bonus dalam persen (%)',
        'mingetbonus' => 'Minimal Pembelian',
        'mingetbonus_desc' => 'Jumlah minimal pembelian :currency untuk mendapatkan bonus',
        'description' => ':amount :currency',
        'success' => 'Terima kasih telah mendukung server kami, kami menghargai donasi Anda.',
        'amount' => 'Jumlah uang yang akan Anda bayar.',
        'amount_receive' => 'Jumlah :currency yang akan Anda terima.',
        'refid' => 'Reference ID Prefix',
        'refid_desc' => 'Masukkan prefix reference ID anda untuk memudahkan anda memilah pembayaran jika memiliki server lebih dari 1',
        'error' => [
            'title' => 'Kesalahan',
            'message' => 'Silakan masukkan jumlah uang yang ingin Anda bayar <b>OR</b> jumlah :currency yang akan anda terima.',
            'minimum' => 'Anda tidak dapat TopUp kurang dari :min :currency.',
            'maximum' => 'Anda tidak dapat TopUp lebih dari :max :currency.',
            'smalmax' => 'Jumlah maksimal tidak boleh kecil dari jumlah minimal'
        ],
        'desc_ipay' => 'Login: :loginid | Jumlah: :amount :currency | Bayar: :pay IDR',
        'no_phone' => 'Mohon untuk mengisi nomer telepon / HP anda!',
        'route_desc' => 'URL Callback iPaymu, Harap ganti saat pertama installasi',
        'route' => 'Route'
    ],
    'history' => [
        'title' => 'Riwayat transaksi',
        'bank' => 'Bank',
        'ingame' => 'Dalam Game',
        'paymentwall' => 'Paymentwall',
        'store' => 'Toko',
        'paypal' => 'Paypal',
        'ipaymu' => 'iPaymu',
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
                'price' => 'Jumlah(:currency)',
                'point' => 'Jumlah(:currency)',
                'date' => 'Tanggal'
            ],
            'paypal' => [
                'trans_id' => 'Id Transaksi',
                'amount' => 'Jumlah',
                'money' => 'Harga',
                'created_at' => 'Tanggal'
            ],
            'ipaymu' => [
                'trans_id' => 'Trx ID',
                'date' => 'Tanggal',
                'vc' => ':currency',
                'money' => 'Harga',
                'status' => 'Status'
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
    'empty' => 'Anda belum melakukan transaksi apa pun!',
    'sandboxActive' => '<strong>Peringatan:</strong> Mode Sandbox sedang aktif!'
];
