<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'tbl_pendidikan';

    protected $primaryKey = 'id_pendidikan';

    protected $fillable = [
        'kode',
        'pendidikan'
    ];

    // Mendapatkan data pendidikan berdasarkan id
    public static function getDataById($id)
    {
        $result = Pendidikan::where('id_pendidikan', $id)->first();
        return $result;
    }
       
}
