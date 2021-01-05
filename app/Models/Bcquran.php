<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Bcquran extends Model
{
    protected $table = 'tbl_bcquran';
    protected $primaryKey = 'id_bcquran';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode',
        'bcquran'
    ];

    // Mendapatkan data kemampuan baca al-qur'an berdasarkan id
    public static function getDataById($id)
    {
        $result = Bcquran::where('id_bcquran', $id)->first();
        return $result;
    }
}
