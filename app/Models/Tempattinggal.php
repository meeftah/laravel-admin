<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Tempattinggal extends Model
{
    protected $table = 'tbl_tempattinggal';
    protected $primaryKey = 'id_tempattinggal';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode',
        'tempattinggal'
    ];

    // Mendapatkan data tempat tinggal berdasarkan id
    public static function getDataById($id)
    {
        $result = Tempattinggal::where('id_tempattinggal', $id)->first();
        return $result;
    }
}
