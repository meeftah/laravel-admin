<?php

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitTableSeed extends Seeder
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
                'id_unit'           => '146f1ec7-bdfa-4f22-b304-9b989ba45c3b',
                'nm_unit'           => 'TKIT',
                'kode_unit'         => '01',
                'kuota'             => 25,
                'biaya_formulir'    => 300000,
                'status'            => 1,
            ],
            [
                'id_unit'           => '9edbdcfd-e9af-467a-b16d-24cb0903a3e5',
                'nm_unit'           => 'SDIT',
                'kode_unit'         => '02',
                'kuota'             => 54,
                'biaya_formulir'    => 200000,
                'status'            => 1,
            ],
            [
                'id_unit'           => 'abe45e27-9ad7-4fb6-8212-3b822ebb5a79',
                'nm_unit'           => 'SMPIT',
                'kode_unit'         => '03',
                'kuota'             => 128,
                'biaya_formulir'    => 250000,
                'status'            => 1,
            ],
            [
                'id_unit'           => '5a12ae18-3458-4f34-bee3-715c582247e0',
                'nm_unit'           => 'SMAIT',
                'kode_unit'         => '04',
                'kuota'             => 64,
                'biaya_formulir'    => 250000,
                'status'            => 1,
            ],
        ];

        foreach ($data as $item) {
            Unit::create([
                'id_unit'           => $item['id_unit'],
                'nm_unit'           => $item['nm_unit'],
                'kode_unit'         => $item['kode_unit'],
                'kuota'             => $item['kuota'],
                'biaya_formulir'    => $item['biaya_formulir'],
                'status'            => $item['status']
            ]);
        }
    }
}
