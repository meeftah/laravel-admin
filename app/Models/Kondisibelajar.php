<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Kondisibelajar extends Model
{
    protected $table = 'tbl_kondisibelajar';
    protected $primaryKey = 'id_kondisibelajar';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode',
        'kondisibelajar'
    ];
}