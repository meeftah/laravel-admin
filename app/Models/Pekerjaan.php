<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = 'tbl_pekerjaan';
    protected $primaryKey = 'id_pekerjaan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode',
        'pekerjaan'
    ];
}
