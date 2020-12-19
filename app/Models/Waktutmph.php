<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Waktutmph extends Model
{
    protected $table = 'tbl_waktutmph';
    protected $primaryKey = 'id_waktutmph';
    protected $fillable = [
        'kode',
        'waktutmph'
    ];
}
