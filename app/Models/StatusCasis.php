<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class StatusCasis extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_status_casis';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_status_casis';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status'
    ];

    // Mendapatkan data status calon siswa berdasarkan id
    public static function getDataById($id)
    {
        $result = StatusCasis::where('id_status_casis', $id)->first();
        return $result;
    }

    // Mendapatkan data status calon siswa berdasarkan nama
    public static function getDataByNama($status)
    {
        $result = StatusCasis::where('status', $status)->first();
        return $result;
    }
}
