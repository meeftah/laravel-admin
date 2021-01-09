<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class CasisSd extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_casis_sd';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_casis_sd';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'tgl_lahir'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'id_va_sd',
        'nm_siswa',
        'jk',
        'nik',
        'tempat_lahir',
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
        'id_dokumen_sd',
        'foto',
        'id_status_casis',
        'ket_status',
        'catatan',
    ];

    // Mendapatkan data status berdasarkan id user
    public static function getStatusCasis($id_user)
    {
        $result = StatusCasis::getDataById(CasisSd::where('id_user', $id_user)->first()->id_status_casis)->status;
        return $result;
    }

    // Data calon siswa dengan status terdaftar
    public static function getTerdaftar()
    {
        $result = CasisSd::where('id_status_casis', StatusCasis::getDataByNama(config('ppdb.status.calon_siswa.terdaftar'))->id_status_casis)->get();
        return $result;
    }

    // Data calon siswa dengan status terverifikasi
    public static function getTerverifikasi()
    {
        $result = CasisSd::where('id_status_casis', StatusCasis::getDataByNama(config('ppdb.status.calon_siswa.terverifikasi'))->id_status_casis)->get();
        return $result;
    }

    // Data calon siswa dengan status data sudah legkap
    public static function getDataLengkap()
    {
        $result = CasisSd::where('id_status_casis', StatusCasis::getDataByNama(config('ppdb.status.calon_siswa.datalengkap'))->id_status_casis)->get();
        return $result;
    }
}
