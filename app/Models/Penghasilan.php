<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Penghasilan extends Model
{
    protected $table = 'tbl_penghasilan';
    protected $primaryKey = 'id_penghasilan';

    protected $fillable = [
        'kode',
        'penghasilan'
    ];

    // Mendapatkan data penghasilan berdasarkan id
    public static function getDataById($id)
    {
        $result = Pekerjaan::where('id_penghasilan', $id)->first();
        return $result;
    }
}
