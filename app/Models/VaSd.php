<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class VaSd extends Model
{

    protected $table = 'tbl_va_sd';
    protected $primaryKey = 'id_va_sd';

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
