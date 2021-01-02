<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Masa aktif Virtual Account
    |--------------------------------------------------------------------------
    |
    | Masa aktif va untuk semua unit dibatasi dengan aturan sebagai berikut
    | # Format:
    |       - 'hari   : va aktif dalam satuan hari (DEFAULT)
    |       - 'jam'   : va aktif dalam satuan jam
    |       - 'menit' : va aktif dalam satuan menit
    |       Jika format di set selain dengan format di atas, maka format 
    |       akan otomatis di set ke format default (hari)
    |
    | # Satuan: dengan tipe data integer
    */
    'masa_aktif' => [
        'format'    => 'hari',
        'satuan'    => 2,
    ],

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    */
    'bank'  => [
        'bni_syariah'   => [
            'nama_bank'         => 'BNI Syariah',
            'kode_bank'         => '988',
            'kode_atm_bersama'  => '009',
            'kode_sekolah'      => '14921',
            'kode_tp'           => '21',
        ]
    ]
];
