<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Smpva extends Model
{

    protected $table = 'tbl_smpva';
    protected $primaryKey = 'id_smpva';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'smpva',
        'kode_nama',
        'status'
    ];

}
