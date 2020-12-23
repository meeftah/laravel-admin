<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class VaTK extends Model
{
    protected $table = 'tbl_va_tk';
    protected $primaryKey = 'id_va_tk';

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
