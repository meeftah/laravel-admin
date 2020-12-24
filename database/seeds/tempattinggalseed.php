<?php

use App\Models\Tempattinggal;
use Illuminate\Database\Seeder;

class tempattinggalseed extends Seeder
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
                'id_tempattinggal' => 'd4f70bb2-2909-426d-a34e-40536c3a55ca',
                'kode'             => 'A',
                'tempattinggal'    => 'Bersama Orang Tua'
            ],
            [
                'id_tempattinggal' => '40ecc575-47e3-4efc-82de-f6a6b88a6aa3',
                'kode'             => 'B',
                'tempattinggal'    => 'Bersama Wali'
            ],
            [
                'id_tempattinggal' => 'a202151e-1cf6-4b1b-88fb-730a56bbf325',
                'kode'             => 'C',
                'tempattinggal'    => 'Kos'
            ],
            [
                'id_tempattinggal' => '64f1bb35-c00a-4fb5-8c57-30c6370deac1',
                'kode'             => 'D',
                'tempattinggal'    => 'Asrama'
            ],
            [
                'id_tempattinggal' => '6836143d-3a6f-4234-9706-47f97ebfcc4e',
                'kode'             => 'E',
                'tempattinggal'    => 'Panti Asuhan'
            ],
            [
                'id_tempattinggal' => '99911807-9555-430d-bfcf-b3d8e1daeed2',
                'kode'             => 'F',
                'tempattinggal'    => 'Lainnya'
            ]

        ];

        foreach ($data as $item) {
            Tempattinggal::create([
                'id_tempattinggal'  => $item['id_tempattinggal'],
                'kode'              => $item['kode'],
                'tempattinggal'     => $item['tempattinggal']
            ]);
        }
    }
}
