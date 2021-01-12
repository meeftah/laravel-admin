<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class VaSd extends Model
{

    protected $table = 'tbl_va_sd';
    protected $primaryKey = 'id_va_sd';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['tanggal_aktif', 'tanggal_berakhir', 'created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'va',
        'kode_nama',
        'tanggal_aktif',
        'tanggal_berakhir',
        'status'
    ];

    // Mendapatkan data va berdasarkan id
    public static function getDataById($id)
    {
        $result = VaSd::where('id_va_sd', $id)->first();
        return $result;
    }
}
