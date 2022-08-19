<?php





/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute harus diterima.',
    'accepted_if' => ':attribute harus diterima bila :other adalah :value.',
    'active_url' => ':attribute bukan URL yang valid.',
    'after' => ':attribute harus tanggal setelah :date.',
    'after_or_equal' => ':attribute harus tanggal setelah atau sama dengan :date.',
    'alpha' => ':attribute hanya boleh berisi huruf.',
    'alpha_dash' => ':attribute hanya boleh berisi huruf, angka, tanda hubung, dan garis bawah.',
    'alpha_num' => ':attribute hanya boleh berisi huruf dan angka.',
    'array' => ':attribute harus berupa array.',
    'before' => ':attribute harus kencan sebelumnya :date.',
    'before_or_equal' => ':attribute harus tanggal sebelum atau sama dengan :date.',
    'between' => [
        'numeric' => ':attribute harus antara :min dan :max.',
        'file' => ':attribute harus antara :min dan :max kilobyte.',
        'string' => ':attribute harus antara :min dan :max karakter.',
        'array' => ':attribute harus antara :min dan :max item.',
    ],
    'boolean' => ':attribute bidang harus benar atau salah.',
    'confirmed' => ':attribute konfirmasi tidak cocok.',
    'current_password' => 'Kata sandi salah.',
    'date' => ':attribute bukan tanggal yang valid.',
    'date_equals' => ':attribute harus tanggal yang sama dengan :date.',
    'date_format' => ':attribute tidak sesuai format :format.',
    'declined' => ':attribute harus ditolak.',
    'declined_if' => ':attribute harus ditolak ketika :other adalah :value.',
    'different' => ':attribute dan :other harus berbeda.',
    'digits' => ':attribute harus :digits digit.',
    'digits_between' => ':attribute harus antara :min dan :max digit.',
    'dimensions' => ':attribute memiliki dimensi gambar yang tidak valid.',
    'distinct' => ':attribute bidang memiliki nilai duplikat.',
    'email' => ':attribute Harus alamat e-mail yang valid.',
    'ends_with' => ':attribute harus diakhiri dengan salah satu dari berikut ini: :values.',
    'enum' => ':attribute yang dipilih tidak valid.',
    'exists' => ':attribute yang dipilih tidak valid.',
    'file' => ':attribute harus berupa file.',
    'filled' => ':attribute bidang harus memiliki nilai.',
    'gt' => [
        'numeric' => ':attribute harus lebih besar dari :value.',
        'file' => ':attribute harus lebih besar dari :value kilobyte.',
        'string' => ':attribute harus lebih besar dari :value karakter.',
        'array' => ':attribute harus lebih besar dari :value item.',
    ],
    'gte' => [
        'numeric' => ':attribute harus lebih besar atau sama dengan :value.',
        'file' => ':attribute harus lebih besar atau sama dengan :value kilobyte.',
        'string' => ':attribute harus lebih besar atau sama dengan :value karakter.',
        'array' => ':attribute harus memiliki :value item atau lebih.',
    ],
    'image' => ':attribute harus berupa gambar.',
    'in' => ':attribute yang dipilih tidak valid.',
    'in_array' => ':attribute bidang tidak ada di :other.',
    'integer' => ':attribute harus bilangan bulat.',
    'ip' => ':attribute harus berupa alamat IP yang valid.',
    'ipv4' => ':attribute harus berupa alamat IPv4 yang valid.',
    'ipv6' => ':attribute harus berupa alamat IPv6 yang valid.',
    'mac_address' => ':attribute harus berupa alamat MAC yang valid.',
    'json' => ':attribute harus berupa string JSON yang valid.',
    'lt' => [
        'numeric' => ':attribute harus kurang dari :value.',
        'file' => ':attribute harus kurang dari :value kilobyte.',
        'string' => ':attribute harus kurang dari :value karakter.',
        'array' => ':attribute harus kurang dari :value item.',
    ],
    'lte' => [
        'numeric' => ':attribute harus lebih kecil atau sama dengan :value.',
        'file' => ':attribute harus lebih kecil atau sama dengan :value kilobyte.',
        'string' => 'The :attribute harus lebih kecil atau sama dengan :value karakter.',
        'array' => ':attribute tidak boleh lebih dari :value item.',
    ],
    'max' => [
        'numeric' => ':attribute tidak boleh lebih besar dari :max.',
        'file' => ':attribute tidak boleh lebih besar dari :max kilobyte.',
        'string' => ':attribute tidak boleh lebih besar dari :max karakter.',
        'array' => ':attribute tidak boleh lebih besar dari :max item.',
    ],
    'mimes' => ':attribute harus berupa file bertipe: :values.',
    'mimetypes' => ':attribute harus berupa file bertipe: :values.',
    'min' => [
        'numeric' => ':attribute harus setidaknya :min.',
        'file' => ':attribute harus setidaknya :min kilobyte.',
        'string' => ':attribute harus setidaknya :min karakter.',
        'array' => ':attribute harus setidaknya :min item.',
    ],
    'multiple_of' => ':attribute harus kelipatan :value.',
    'not_in' => ':attribute yang dipilih tidak valid.',
    'not_regex' => ':attribute formatnya tidak valid.',
    'numeric' => ':attribute harus berupa angka.',
    'password' => 'Kata sandi salah.',
    'present' => ':attribute harus ada.',
    'prohibited' => ':attribute dilarang.',
    'prohibited_if' => ':attribute dilarang ketika :other adalah :value.',
    'prohibited_unless' => ':attribute dilarang kecuali :other ada di dalam :values.',
    'prohibits' => ':attribute larangan :other dari hadir.',
    'regex' => ':attribute formatnya tidak valid.',
    'required' => ':attribute diperlukan.',
    'required_if' => ':attribute bidang diperlukan ketika :other adalah :value.',
    'required_unless' => ':attribute bidang diperlukan kecuali :other ada di dalam :values.',
    'required_with' => ':attribute bidang diperlukan ketika :values hadir.',
    'required_with_all' => ':attribute bidang diperlukan ketika :values hadir.',
    'required_without' => ':attribute bidang diperlukan ketika :values tidak hadir.',
    'required_without_all' => ':attribute kolom wajib diisi jika tidak ada :values hadir.',
    'same' => ':attribute dan :other harus cocok.',
    'size' => [
        'numeric' => ':attribute harus :size.',
        'file' => ':attribute harus :size kilobyte.',
        'string' => ':attribute harus :size karakter.',
        'array' => ':attribute harus mengandung :size item.',
    ],
    'starts_with' => ':attribute harus dimulai dengan salah satu dari berikut ini: :values.',
    'string' => ':attribute harus berupa string.',
    'timezone' => ':attribute harus berupa zona waktu yang valid.',
    'unique' => ':attribute sudah diambil.',
    'uploaded' => ':attribute gagal mengunggah.',
    'url' => ':attribute harus berupa URL yang valid.',
    'uuid' => ':attribute harus berupa UUID yang valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'server_name' => __('system.server_name'),
        'currency_name' => __('system.currency_name'),
        'server_ip' => __('system.server_ip'),
        'server_version' => __('system.server_version'),
        'encryption_type' => __('system.encrypt_type'),

        'widget_code' => __('donate.paymentwall_link'),
        'widget_width' => __('donate.paymentwall_widget_width'),
        'widget_high' => __('donate.paymentwall_widget_high'),
        'project_key' => __('donate.paymentwall_project_key'),
        'secret_key' => __('donate.paymentwall_key'),

        'accountOwner' => __('donate.bank.owner'),
        'bankName1' => __('donate.bank.bankName1'),
        'bankName2' => __('donate.bank.bankName2'),
        'bankName3' => __('donate.bank.bankName3'),
        'bankAccountNo1' => __('donate.bank.bankAccountNo1'),
        'bankAccountNo2' => __('donate.bank.bankAccountNo2'),
        'bankAccountNo3' => __('donate.bank.bankAccountNo3'),
        'multiply' => __('donate.bank.multiply'),
        'limit' => __('donate.bank.limit'),
        'CurrencySign' => __('donate.bank.CurrencySign'),
        'payment_price' => __('donate.bank.payment_price', ['coinName' => config('pw-config.currency_name')]),

        'code' => __('voucher.code'),
        'amount' => __('voucher.amount', ['currency' => config('pw-config.currency_name')]),

        'broadcast_price' => __('service.label.broadcast'),
        'virtual_to_cubi_price' => __('service.label.virtual_to_cubi'),
        'cultivation_change_price' => __('service.label.cultivation_change'),
        'gold_to_virtual_price' => __('service.label.gold_to_virtual'),
        'level_up_price' => __('service.label.level_up'),
        'max_meridian_price' => __('service.label.max_meridian'),
        'reset_exp_price' => __('service.label.reset_exp'),
        'reset_sp_price' => __('service.label.reset_sp'),
        'reset_stash_password_price' => __('service.label.reset_stash_password'),
        'teleport_price' => __('service.label.teleport')
    ],

];
