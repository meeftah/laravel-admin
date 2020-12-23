<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class VaSma extends Model
{

    protected $table = 'tbl_va_sma';
    protected $primaryKey = 'id_va_sma';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'va',
        'kode_nama',
        'status'
    ];
}
