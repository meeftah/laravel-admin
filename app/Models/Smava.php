<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Smava extends Model
{

    protected $table = 'tbl_smava';
    protected $primaryKey = 'id_smava';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'smava',
        'kode_nama',
        'status'
    ];
}
