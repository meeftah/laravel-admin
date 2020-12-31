<?php

use App\Models\TahunAjaran;
use Illuminate\Database\Seeder;

class TahunAjaranTableSeed extends Seeder
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
                'id_tahun_ajaran'  => 'e9005311-e9de-47b7-9593-335b213693b8',
                'tahun_ajaran'     => '2021/2022',
                'periode_mulai'    => '04/01/2020',
                'periode_akhir'    => '04/04/2020',
                'status'           => 1
            ],
        ];

        foreach ($data as $item) {
            TahunAjaran::create([
                'id_tahun_ajaran'   => $item['id_tahun_ajaran'],
                'tahun_ajaran'      => $item['tahun_ajaran'],
                'periode_mulai'     => $item['periode_mulai'],
                'periode_akhir'     => $item['periode_akhir'],
                'status'            => $item['status'],
            ]);
        }
    }
}
