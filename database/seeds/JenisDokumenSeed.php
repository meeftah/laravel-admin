<?php

use App\Models\Jenisdokumen;
use Illuminate\Database\Seeder;

class JenisDokumenSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataSemuaUnit = [
            [
                'id_jenisdokumen' => '7dfc0b93-dfba-4988-a9c8-b4039210c045',
                'jenisdokumen'    => 'KTP Ayah',
            ],
            [
                'id_jenisdokumen' => '43fcd618-6f4b-46b5-bdbd-0f88bb49dad5',
                'jenisdokumen'    => 'KTP Ibu',
            ],
            [
                'id_jenisdokumen' => '0ca3c7f4-5262-40c1-b2b5-4a375553daa0',
                'jenisdokumen'    => 'Kartu Keluarga',
            ],
            [
                'id_jenisdokumen' => 'c58283e1-7254-4372-a27e-bc1d2fcfe4cd',
                'jenisdokumen'    => 'Akte Lahir',
            ],
            [
                'id_jenisdokumen' => '79c9fb49-7fc9-497e-9802-b6e7de9d5cc3',
                'jenisdokumen'    => 'Surat Keterangan Dokter',
            ],
        ];

        foreach ($dataSemuaUnit as $item) {
            Jenisdokumen::create([
                'id_jenisdokumen'   => $item['id_jenisdokumen'],
                'jenisdokumen'      => $item['jenisdokumen'],
            ]);
        }

        $dataUnitKhusus = [
            [
                'id_jenisdokumen' => '7274cd7c-a6df-4bbd-82b3-ea4784a4318f',
                'jenisdokumen'    => 'Kelas 5 Semester 1',
                'id_unit'         => 'abe45e27-9ad7-4fb6-8212-3b822ebb5a79',
            ],
            [
                'id_jenisdokumen' => '90b72f46-27cf-4ebc-9ce8-df93816f10f7',
                'jenisdokumen'    => 'Kelas 5 Semester 2',
                'id_unit'         => 'abe45e27-9ad7-4fb6-8212-3b822ebb5a79',
            ],
            [
                'id_jenisdokumen' => '8d8a2ab1-eba0-4607-b021-3afd9453f536',
                'jenisdokumen'    => 'Kelas 6 Semester 1',
                'id_unit'         => 'abe45e27-9ad7-4fb6-8212-3b822ebb5a79',
            ],
            [
                'id_jenisdokumen' => 'e939bcab-5053-4c0f-b5ce-9e22e19eeaac',
                'jenisdokumen'    => 'Kelas 8 Semester 1',
                'id_unit'         => '5a12ae18-3458-4f34-bee3-715c582247e0',
            ],
            [
                'id_jenisdokumen' => 'ff3b5ecc-c823-46df-9621-770134fd4e71',
                'jenisdokumen'    => 'Kelas 8 Semester 2',
                'id_unit'         => '5a12ae18-3458-4f34-bee3-715c582247e0',
            ],
            [
                'id_jenisdokumen' => 'bb6bab39-cfed-4016-98ab-f69b59a500f9',
                'jenisdokumen'    => 'Kelas 9 Semester 1',
                'id_unit'         => '5a12ae18-3458-4f34-bee3-715c582247e0',
            ],
        ];

        foreach ($dataUnitKhusus as $item) {
            Jenisdokumen::create([
                'id_jenisdokumen'   => $item['id_jenisdokumen'],
                'jenisdokumen'      => $item['jenisdokumen'],
                'id_unit'           => $item['id_unit'],
            ]);
        }
    }
}
