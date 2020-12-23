<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class VaSmp extends Model
{

    protected $table = 'tbl_va_smp';
    protected $primaryKey = 'id_va_smp';

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
