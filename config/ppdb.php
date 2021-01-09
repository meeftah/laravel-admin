<?php

return [
    'status'    => [
        'calon_siswa'   => [
            'terdaftar'         => 'Terdaftar',
            'terdaftar_bct'     => 'secondary',
            'nonaktif'          => 'Non Aktif',
            'nonaktif_bct'      => 'danger',
            'datalengkap'       => 'Data Lengkap',
            'datalengkap_bct'   => 'primary',
            'terverifikasi'     => 'Terverifikasi',
            'terverifikasi_bct' => 'info',
            'lulus'             => 'Lulus',
            'lulus_bct'         => 'success',
            'siaptes'           => 'Siap Tes',
            'siaptes_bct'       => 'warning',
        ],
        'pendaftaran'   => [
            'baru'      => 'Siswa Baru',
            'pindahan'  => 'Siswa Pindahan',
        ]
    ],
    'va'        => [
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
        | Keterangan Bank
        |--------------------------------------------------------------------------
        |
        | Dimana sekolah mengisi data yang berhubungan dengan bank
        | data ini digunakan untuk detail dalam mengirimkan va
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
    ],
    'peran'     => [
        'superadmin'=> 'superadmin',
        'tu'        => [
            'tk'    => 'TU TK',
            'sd'    => 'TU SD',
            'tk'    => 'TU SMP',
            'tk'    => 'TU SMA',
        ],
        'casis'     => [
            'tk'    => 'Calon Siswa TK',
            'sd'    => 'Calon Siswa SD',
            'smp'   => 'Calon Siswa SMP',
            'sma'   => 'Calon Siswa SMA',
        ],
        'keuangan'  => 'Staff Keuangan',
    ]

];
