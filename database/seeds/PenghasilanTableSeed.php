<?php

use Illuminate\Database\Seeder;
use App\Models\Penghasilan;

class PenghasilanTableSeed extends Seeder
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
                'id_penghasilan' => 'a2138718-4d67-4733-9bb4-bcfc2ab79019',
                'kode'           => 'A',
                'penghasilan'    => '< Rp. 500.000,-'
            ],
            [
                'id_penghasilan' => '3039aa4b-f00f-48e8-9720-f25dbb90e22c',
                'kode'           => 'B',
                'penghasilan'    => 'Rp. 500.000,- s.d Rp. 999.999,-'
            ],
            [
                'id_penghasilan' => 'fc634922-2a50-4157-aee8-df6f42bd9027',
                'kode'           => 'C',
                'penghasilan'    => 'Rp. 1.000.000,- s.d Rp. 1.999.999,-'
            ],
            [
                'id_penghasilan' => '42f4cec4-cd0e-468b-a3fa-67f364ced951',
                'kode'           => 'D',
                'penghasilan'    => 'Rp. 2.000.000,- s.d Rp. 4.999.999,-'
            ],
            [
                'id_penghasilan' => 'e1283df1-22da-4aca-914e-2dbacf6aabdb',
                'kode'           => 'E',
                'penghasilan'    => 'Rp. 5.000.000 s.d Rp. 20.000.000'
            ],
            [
                'id_penghasilan' => '2718559e-add6-4f53-a4ab-e196768cc117',
                'kode'           => 'F',
                'penghasilan'    => '> Rp. 20.000.000'
            ],
            [
                'id_penghasilan' => '4a3beb5f-47fb-47d5-a667-16e4a8f946fc',
                'kode'           => 'G',
                'penghasilan'    => 'Tidak Berpenghasilan'
            ]
        ];

        foreach ($data as $item) {
            Penghasilan::create([
                'id_penghasilan'   => $item['id_penghasilan'],
                'kode'             => $item['kode'],
                'penghasilan'      => $item['penghasilan']
            ]);
        }
    }
}
