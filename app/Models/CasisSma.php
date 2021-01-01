<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class CasisSma extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_casis_sma';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_casis_sma';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'id_va_sma',
        'nm_siswa',
        'jk',
        'nisn',
        'nik',
        'no_ijazah',
        'no_skhun',
        'no_un',
        'tempat',
        'tgl_lahir',
        'no_akte_lahir',
        'id_agama',
        'kebutuhan_khusus',
        'jalan',
        'rt',
        'rw',
        'desalurah',
        'kecamatan',
        'kabkota',
        'kodepos',
        'id_tempattinggal',
        'id_transportasi',
        'no_kks',
        'no_kps',
        'no_kip',
        'nm_kip',
        'suket_miskin',
        'yatim_piatu',
        'id_kondisibelajar',
        'id_bcquran',
        'olahraga',
        'kesenian',
        'hobby',
        'penyakit',
        'tinggi_badan',
        'berat_badan',
        'id_jarak',
        'id_waktutmph',
        'jumlah_saudara',
        'anak_ke',
        'dari_bersaudara',
        'id_data_ortu',
        'id_dokumen_sma',
        'foto',
        'id_status_casis',
        'ket_status',
        'catatan',
    ];

    // Mendapatkan data status berdasarkan id user
    public static function getStatusCasis($id_user)
    {
        $result = StatusCasis::getDataById(CasisSma::where('id_user', $id_user)->first()->id_status_casis)->status;
        return $result;
    }
}
