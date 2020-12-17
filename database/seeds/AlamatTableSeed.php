<?php

use Illuminate\Database\Seeder;
use App\Models\Alamat;

class AlamatTableSeed extends Seeder
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
                'id_alamat' => '298b3adb-35d6-4245-b1b4-52c2da32086c',
                'kode'      => 'A',
                'alamat'    => '0 s.d. 1 Km'
            ],
            [
                'id_alamat' => '744215bb-e0ac-4db5-bf3e-762e75c3b998',
                'kode'      => 'B',
                'alamat'    => '1 s.d. 3 Km'
            ],
            [
                'id_alamat' => '3fbce64b-a4e8-48ba-8774-724abc390127',
                'kode'      => 'C',
                'alamat'    => '3 s.d. 5 Km'
            ],
            [
                'id_alamat' => '49fa87ab-99bc-48bc-b6af-c0ac1f0066d2',
                'kode'      => 'D',
                'alamat'    => '5 s.d. 10 Km'
            ],
            [
                'id_alamat' => '786422fe-f806-42b4-82e8-16a988ccaf98',
                'kode'      => 'E',
                'alamat'    => 'Lebih dari 10 Km'
            ]
        ];

        foreach ($data as $item) {
            Alamat::create([
                'id_alamat'   => $item['id_alamat'],
                'kode'        => $item['kode'],
                'alamat'      => $item['alamat']
            ]);
        }
    }
}
