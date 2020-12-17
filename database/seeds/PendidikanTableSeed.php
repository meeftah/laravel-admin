<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Pendidikan;

class PendidikanTableSeed extends Seeder
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
                'id_pendidikan' => 'b1ff6f58-c5b1-4f24-bf03-ffcde35f443f',
                'kode'      => 'A',
                'pendidikan'    => 'Tidak Tamat SD/MI/Paket A'
            ],
            [
                'id_pendidikan' => '1fc3e1c1-f88b-4c62-aae3-8f47d1616d69',
                'kode'      => 'B',
                'pendidikan'    => 'SD/MI/Paket A'
            ],
            [
                'id_pendidikan' => 'd452b7ca-531d-4012-b9b5-79b2eea60a9f',
                'kode'      => 'C',
                'pendidikan'    => 'SMP/MTs/Paket B'
            ],
            [
                'id_pendidikan' => 'e02679fe-5592-4f15-8037-90fce5413026',
                'kode'      => 'D',
                'pendidikan'    => 'SMA/MA/Paket C'
            ],
            [
                'id_pendidikan' => '00ea5e03-88c6-4bba-a388-1086ef7477da',
                'kode'      => 'E',
                'pendidikan'    => 'Diploma 1 & 2'
            ],
            [
                'id_pendidikan' => 'cc39c047-954a-4b79-804a-b6ddaa3cee69',
                'kode'      => 'F',
                'pendidikan'    => 'Diploma 3 & 4'
            ],
            [
                'id_pendidikan' => '0de06395-2ba6-4ea1-9a4c-efa950327a85',
                'kode'      => 'G',
                'pendidikan'    => 'S.1 (Sarjana)'
            ],
            [
                'id_pendidikan' => 'c5454557-ebd6-4f6c-9614-ef189ccf19d8',
                'kode'      => 'H',
                'pendidikan'    => 'S.2 (Magister)'
            ],
            [
                'id_pendidikan' => '4533c5b7-0e8c-4035-8631-7affa96fa283',
                'kode'      => 'I',
                'pendidikan'    => 'S.3 (Doktor)'
            ],
            [
                'id_pendidikan' => '673c2281-9fab-45f6-a22f-0beec3ebcf2b',
                'kode'      => 'J',
                'pendidikan'    => 'Lainnya'
            ]
        ];

        foreach ($data as $item) {
            Pendidikan::create([
                'id_pendidikan'   => $item['id_pendidikan'],
                'kode'            => $item['kode'],
                'pendidikan'      => $item['pendidikan']
            ]);
        }
    }
}
