<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Agama;

class AgamaTableSeed extends Seeder
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
                'id_agama'  => '0d8f3110-b357-44dc-b7e1-882656b7f31d',
                'kode'      => 'A',
                'agama'     => 'Islam'
            ],
            [
                'id_agama'  => '22418169-8e93-41e2-b9ef-a9f5c1b0a739',
                'kode'      => 'B',
                'agama'     => 'Katolik'
            ],
            [
                'id_agama'  => 'c15feceb-bd41-4a7b-a5e0-fc2d589f8e08',
                'kode'      => 'C',
                'agama'     => 'Protestan'
            ],
            [
                'id_agama'  => '175d2329-fd50-428c-8606-b3b2bd5921f4',
                'kode'      => 'D',
                'agama'     => 'Budha'
            ],
            [
                'id_agama'  => '00a8fe17-246f-4b80-8780-6406a4c3043c',
                'kode'      => 'E',
                'agama'     => 'Hindu'
            ],
            [
                'id_agama'  => '01f6fd2e-7245-43ef-a0ce-bc842cb093e8',
                'kode'      => 'F',
                'agama'     => 'Khonghucu'
            ],
            [
                'id_agama'  => 'b51b2e80-2eab-4f98-b8a3-798e68905074',
                'kode'      => 'G',
                'agama'     => 'Lainnya'
            ]
        ];

        foreach ($data as $item) {
            Agama::create([
                'id_agama'   => $item['id_agama'],
                'kode'       => $item['kode'],
                'agama'      => $item['agama']
            ]);
        }
    }
}
