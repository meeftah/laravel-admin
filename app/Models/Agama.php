<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Agama extends Model
{
    protected $table = 'tbl_agama';
    protected $primaryKey = 'id_agama';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode',
        'agama'
    ];
}
