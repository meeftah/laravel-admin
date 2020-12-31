<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Jarak extends Model
{
    protected $table = 'tbl_jarak';
    protected $primaryKey = 'id_jarak';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode',
        'jarak'
    ];
}