<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Sdva extends Model
{

    protected $table = 'tbl_sdva';
    protected $primaryKey = 'id_sdva';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sdva',
        'kode_nama',
        'status'
    ];

}
