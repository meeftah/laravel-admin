<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Penghasilan extends Model
{
    protected $table = 'tbl_penghasilan';
    protected $primaryKey = 'id_penghasilan';

    protected $fillable = [
        'kode',
        'penghasilan'
    ];
}
