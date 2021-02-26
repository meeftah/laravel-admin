<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class InfoTambahan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_info_tambahan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'judul',
        'deskripsi',
        'ikon'
    ];

    public static function getDataById($id)
    {
        $result = InfoTambahan::where('id', $id)->first();
        return $result;
    }

    public function infoTambahanDetail()
    {
        return $this->hasMany(InfoTambahanDetail::class, 'id_info_tambahan');
    }
}
