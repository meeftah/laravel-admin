<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Wilayah extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_wilayah';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode',
        'wilayah'
    ];

    // Mendapatkan data wilayah berdasarkan kode
    public static function getDataByKode($kode)
    {
        $result = Wilayah::where('kode', $kode)->first();
        return $result;
    }
}
