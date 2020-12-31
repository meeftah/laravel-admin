<?php

use App\Models\StatusPendaftaran;
use Illuminate\Database\Seeder;

class StatusPendaftaranTableSeed extends Seeder
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
                'id_status_pendaftaran'  => '2e6d337a-5d33-4c63-8f9c-ab7391b3b94a',
                'status'                 => 'Siswa Baru',
            ],
            [
                'id_status_pendaftaran'  => '9fac2b5f-057f-4733-a79f-98d6f22591a9',
                'status'                 => 'Siswa Pindahan',
            ],
        ];

        foreach ($data as $item) {
            StatusPendaftaran::create([
                'id_status_pendaftaran'   => $item['id_status_pendaftaran'],
                'status'                  => $item['status'],
            ]);
        }
    }
}
