<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Transportasi extends Model
{
    protected $table = 'tbl_transportasi';
    protected $primaryKey = 'id_transportasi';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode',
        'transportasi'
    ];
}
