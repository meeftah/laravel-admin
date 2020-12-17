<?php

use Illuminate\Database\Seeder;
use App\Models\Kondisibelajar;

class KondisibelajarTableSeed extends Seeder
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
                'id_kondisibelajar' => '298b3adb-35d6-4245-b1b4-52c2da32086c',
                'kode'              => 'A',
                'kondisibelajar'    => 'Memiliki Kamar Sendiri'
            ],
            [
                'id_kondisibelajar' => '744215bb-e0ac-4db5-bf3e-762e75c3b998',
                'kode'              => 'B',
                'kondisibelajar'    => 'Memiliki Meja Belajar'
            ],
            [
                'id_kondisibelajar' => '3fbce64b-a4e8-48ba-8774-724abc390127',
                'kode'              => 'C',
                'kondisibelajar'    => 'Belajar Didampingi Orang Tua'
            ]
        ];

        foreach ($data as $item) {
            Kondisibelajar::create([
                'id_kondisibelajar'     => $item['id_kondisibelajar'],
                'kode'                  => $item['kode'],
                'kondisibelajar'        => $item['kondisibelajar']
            ]);
        }
    }
}
