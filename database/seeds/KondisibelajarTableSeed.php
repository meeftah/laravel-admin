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
                'id_kondisibelajar' => 'bbaeed3f-d463-40b0-8753-e9de32724e9d',
                'kode'              => 'A',
                'kondisibelajar'    => 'Memiliki Kamar Sendiri'
            ],
            [
                'id_kondisibelajar' => '615266c1-0c54-4733-b18c-e3bcbdd65c5c',
                'kode'              => 'B',
                'kondisibelajar'    => 'Memiliki Meja Belajar'
            ],
            [
                'id_kondisibelajar' => '55a1c5e3-f7f4-40a8-a355-78dc71e44002',
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
