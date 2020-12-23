<?php

use Illuminate\Database\Seeder;
use App\Models\Jarak;

class JarakTableSeed extends Seeder
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
                'id_jarak' => '298b3adb-35d6-4245-b1b4-52c2da32086c',
                'kode'      => 'A',
                'jarak'    => '0 s.d. 1 Km'
            ],
            [
                'id_jarak' => '744215bb-e0ac-4db5-bf3e-762e75c3b998',
                'kode'      => 'B',
                'jarak'    => '1 s.d. 3 Km'
            ],
            [
                'id_jarak' => '3fbce64b-a4e8-48ba-8774-724abc390127',
                'kode'      => 'C',
                'jarak'    => '3 s.d. 5 Km'
            ],
            [
                'id_jarak' => '49fa87ab-99bc-48bc-b6af-c0ac1f0066d2',
                'kode'      => 'D',
                'jarak'    => '5 s.d. 10 Km'
            ],
            [
                'id_jarak' => '786422fe-f806-42b4-82e8-16a988ccaf98',
                'kode'      => 'E',
                'jarak'    => 'Lebih dari 10 Km'
            ]
        ];

        foreach ($data as $item) {
            Jarak::create([
                'id_jarak'   => $item['id_jarak'],
                'kode'        => $item['kode'],
                'jarak'      => $item['jarak']
            ]);
        }
    }
}
