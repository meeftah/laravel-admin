<?php

use App\Models\StatusCasis;
use Illuminate\Database\Seeder;

class StatusCasisTableSeed extends Seeder
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
                'id_status_casis'  => '3ee1321c-39ae-4d2f-ac65-b530f294c09a',
                'status'           => 'Terdaftar',
            ],
            [
                'id_status_casis'  => 'e9114359-336b-4400-995d-8a37576cdb2e',
                'status'           => 'Non Aktif',
            ],
            [
                'id_status_casis'  => '13446f17-37b0-445f-8cf4-4dee171c5001',
                'status'           => 'Data Lengkap',
            ],
            [
                'id_status_casis'  => '12f81040-708c-4d83-9b64-4a347a2ed1e7',
                'status'           => 'Terverifikasi',
            ],
            [
                'id_status_casis'  => 'f2834c74-bc1e-4d01-832e-eee467c67c2d',
                'status'           => 'Lulus',
            ],
        ];

        foreach ($data as $item) {
            StatusCasis::create([
                'id_status_casis'   => $item['id_status_casis'],
                'status'            => $item['status'],
            ]);
        }
    }
}
