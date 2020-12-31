<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Unit extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_unit';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_unit';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nm_unit',
        'kuota',
        'status',
    ];

    // Mendapatkan data unit berdasarkan id
    public static function getDataById($id)
    {
        $result = Unit::where('id', $id)->first();
        return $result;
    }
}
