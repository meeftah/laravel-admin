<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Jenisdokumen extends Model
{
    protected $table = 'tbl_jenisdokumen';
    protected $primaryKey = 'id_jenisdokumen';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jenisdokumen',
        'unit'
    ];
}
