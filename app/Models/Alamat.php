<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $table = 'tbl_alamat';
    protected $primaryKey = 'id_alamat';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode',
        'alamat'
    ];
}
