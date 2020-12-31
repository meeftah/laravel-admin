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
                'id_unit'   => '146f1ec7-bdfa-4f22-b304-9b989ba45c3b',
                'nm_unit'   => 'TKIT',
                'kuota'     => 25,
                'status'    => 0,
            ],
            [
                'id_unit'   => '9edbdcfd-e9af-467a-b16d-24cb0903a3e5',
                'nm_unit'   => 'SDIT',
                'kuota'     => 54,
                'status'    => 0,
            ],
            [
                'id_unit'   => 'abe45e27-9ad7-4fb6-8212-3b822ebb5a79',
                'nm_unit'   => 'SMPIT',
                'kuota'     => 128,
                'status'    => 0,
            ],
            [
                'id_unit'   => '5a12ae18-3458-4f34-bee3-715c582247e0',
                'nm_unit'   => 'SMAIT',
                'kuota'     => 64,
                'status'    => 0,
            ],
        ];

        foreach ($data as $item) {
            Unit::create([
                'id_unit'   => $item['id_unit'],
                'nm_unit'   => $item['nm_unit'],
                'kuota'     => $item['kuota'],
                'status'    => $item['status']
            ]);
        }
    }
}
