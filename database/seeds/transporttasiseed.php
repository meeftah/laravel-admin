<?php

use App\Models\Tempattinggal;
use App\Models\Transportasi;
use Illuminate\Database\Seeder;

class transporttasiseed extends Seeder
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
                'id_transportasi' => '89ac372c-d62d-4e65-a419-9c2c0c2c8c1f',
                'kode'            => 'A',
                'transportasi'    => 'Jalan Kaki'
            ],
            [
                'id_transportasi' => '02ba3db5-e90b-42b0-9604-30a1419cee4f',
                'kode'            => 'B',
                'transportasi'    => 'Perahu'
            ],
            [
                'id_transportasi' => 'adb16493-9ce6-41b4-96bc-80a3c9037c7e',
                'kode'            => 'C',
                'transportasi'    => 'Sepeda'
            ],
            [
                'id_transportasi' => 'f6ab6a49-b5f2-4bfe-95c4-3b3ccfa32f68',
                'kode'            => 'D',
                'transportasi'    => 'Motor'
            ],
            [
                'id_transportasi' => 'f4029cb9-cc84-4a45-b126-070960b8adcb',
                'kode'            => 'E',
                'transportasi'    => 'Mobil'
            ],
            [
                'id_transportasi' => '95382001-3139-4f9a-9c23-43a3200b5d1a',
                'kode'            => 'F',
                'transportasi'    => 'Antar-Jemput'
            ],
            [
                'id_transportasi' => '7b2bfad7-1d58-4551-9274-295ecd17bed8',
                'kode'            => 'G',
                'transportasi'    => 'Angkutan Umum'
            ],
            [
                'id_transportasi' => '5ce23c1a-b183-4d5e-bfb3-de37056ea08e',
                'kode'            => 'H',
                'transportasi'    => 'Lainnya'
            ]

        ];

        foreach ($data as $item) {
            Transportasi::create([
                'id_transportasi'   => $item['id_transportasi'],
                'kode'              => $item['kode'],
                'transportasi'      => $item['transportasi']
            ]);
        }
    }
}
