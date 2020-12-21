<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Tkva extends Model
{
    protected $table = 'tbl_tkva';
    protected $primaryKey = 'id_tkva';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tkva',
        'kode_nama',
        'status'
    ];
}
