<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Tempattinggal extends Model
{
    protected $table = 'tbl_tempattinggal';
    protected $primaryKey = 'id_tempattinggal';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode',
        'tempattinggal'
    ];
}
