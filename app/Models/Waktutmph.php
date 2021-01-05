<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Waktutmph extends Model
{
    protected $table = 'tbl_waktutmph';
    protected $primaryKey = 'id_waktutmph';
    protected $fillable = [
        'kode',
        'waktutmph'
    ];

    // Mendapatkan data agama berdasarkan id
    public static function getDataById($id)
    {
        $result = Waktutmph::where('id_waktutmph', $id)->first();
        return $result;
    }
}
