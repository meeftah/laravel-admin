<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_tahun_ajaran';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_tahun_ajaran';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['periode_mulai', 'periode_akhir'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tahun_ajaran',
        'periode_mulai',
        'periode_akhir',
        'status',
    ];
}
