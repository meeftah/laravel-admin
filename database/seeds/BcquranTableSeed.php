<?php

use Illuminate\Database\Seeder;
Use App\Models\Bcquran;
class BcquranTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $data = [
            [
                'id_bcquran' => '3fefd6c4-7cbd-44fd-ab0e-3c3c49074c3e',
                'kode'      => 'A',
                'bcquran'    => 'Lancar'
            ],
            [
                'id_bcquran' => 'e8b1149b-fb80-4acd-8e6d-d7d9024bde94',
                'kode'      => 'B',
                'bcquran'    => 'Biasa'
            ],
            [
                'id_bcquran' => '5a0877c1-cf83-459d-baaf-510dc246d387',
                'kode'      => 'C',
                'bcquran'    => 'Belum Bisa'
            ],
            [
                'id_bcquran' => '227e67e3-9407-42a9-b706-0fc00f22f05e',
                'kode'      => 'D',
                'bcquran'    => 'Tanpa Tajwid'
            ]
        ];

        foreach ($data as $item) {
            Bcquran::create([
                'id_bcquran'   => $item['id_bcquran'],
                'kode'        => $item['kode'],
                'bcquran'      => $item['bcquran']
            ]);
        }

    }
}
