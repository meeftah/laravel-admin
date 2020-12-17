<?php

use Illuminate\Database\Seeder;
use App\Models\Pekerjaan;

class PekerjaanTableSeed extends Seeder
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
                'id_pekerjaan'        => 'a29ca25c-9cbc-473b-b794-221c7d1488fd',
                'kode'      => 'A',
                'pekerjaan' => 'PNS'
            ],
            [
                'id_pekerjaan'        => 'c33aaeac-14fc-43e2-a73b-8acc4ed23571',
                'kode'      => 'B',
                'pekerjaan' => 'TNI/Polri'
            ],
            [
                'id_pekerjaan'        => 'f785fa27-2f46-4172-a18b-3b775183e12a',
                'kode'      => 'C',
                'pekerjaan' => 'Guru/Dosen'
            ],
            [
                'id_pekerjaan'        => '8433ec1f-5e5b-48e5-a7e5-cca96a41f96d',
                'kode'      => 'D',
                'pekerjaan' => 'Dokter'
            ],
            [
                'id_pekerjaan'        => '75344dbc-b354-4ab1-a04d-460b67a8f9e9',
                'kode'      => 'E',
                'pekerjaan' => 'Politikus'
            ],
            [
                'id_pekerjaan'        => '97d04dfd-5650-42d3-9934-4ad76938ff8d',
                'kode'      => 'F',
                'pekerjaan' => 'Pegawai Swasta'
            ],
            [
                'id_pekerjaan'        => 'eea0eb42-a1cd-4a61-85cf-75cd1efc6198',
                'kode'      => 'G',
                'pekerjaan' => 'Pedagang/Wiraswasta'
            ],
            [
                'id_pekerjaan'        => '52b7eafb-f6ee-4752-8eb2-9d1befc947ea',
                'kode'      => 'H',
                'pekerjaan' => 'Petani/Peternak'
            ],
            [
                'id_pekerjaan'        => 'ae81f77d-c465-4230-9987-439725ae67fc',
                'kode'      => 'I',
                'pekerjaan' => 'Seniman'
            ],
            [
                'id_pekerjaan'        => '9405e550-790e-4e7d-8fe0-f83abeb47900',
                'kode'      => 'J',
                'pekerjaan' => 'Buruh'
            ],
            [
                'id_pekerjaan'        => '06976e03-1dcb-42e8-b87e-8de3a5780b8c',
                'kode'      => 'K',
                'pekerjaan' => 'Dirumah'
            ]
        ];

        foreach ($data as $item) {
            Pekerjaan::create([
                'id_pekerjaan'   => $item['id_pekerjaan'],
                'kode'           => $item['kode'],
                'pekerjaan'      => $item['pekerjaan']
            ]);
        }
    }
}
