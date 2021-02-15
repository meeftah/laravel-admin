<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class InfoTambahanDetail extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_info_tambahan_detail';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_info_tambahan',
        'judul',
        'deskripsi',
        'ikon'
    ];

    public static function getDataById($id)
    {
        $result = InfoTambahanDetail::where('id', $id)->first();
        return $result;
    }

    public static function getParentDataById($id)
    {
        $id_info_tambahan = InfoTambahanDetail::where('id', $id)->first()->id_info_tambahan;
        $result = InfoTambahan::where('id', $id_info_tambahan)->first();
        return $result;
    }

    public function infoTambahan()
    {
        return $this->belongsTo(InfoTambahan::class);
    }
}
