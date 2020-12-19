<?php

use App\Models\Waktutmph;
use Illuminate\Database\Seeder;

class WaktutmphTableSeed extends Seeder
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
                'id_waktutmph' => '10e262ad-e4c5-463b-baff-260774040b49',
                'kode'           => 'A',
                'waktutmph'    => '0 s.d 10 menit'
            ],
            [
                'id_waktutmph' => '758216e9-194a-44f2-b689-e531950fd0bd',
                'kode'           => 'B',
                'waktutmph'    => '10 s.d 30 menit'
            ],
            [
                'id_waktutmph' => 'a0ed7565-3d83-4ea9-bda1-c5c57a0a5c50',
                'kode'           => 'C',
                'waktutmph'    => '30 s.d 59 menit'
            ],
            [
                'id_waktutmph' => '9be235cf-0d6f-4b3e-a697-bad9789ee84d',
                'kode'           => 'D',
                'waktutmph'    => 'Lebih Dari 1 Jam'
            ]
        ];

        foreach ($data as $item) {
            Waktutmph::create([
                'id_waktutmph'   => $item['id_waktutmph'],
                'kode'             => $item['kode'],
                'waktutmph'      => $item['waktutmph']
            ]);
        }
    }
}
