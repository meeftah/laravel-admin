<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Hash;
use Illuminate\Support\Facades\Auth;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 */
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $fillable = ['username', 'email', 'nohp', 'password'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }


    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    // Mendapatkan data user berdasarkan id
    public static function getDataById($id)
    {
        $result = User::where('id', $id)->first();
        return $result;
    }

    // User Mendapatkan data status berdasarkan id nya
    public function getStatusCasisKu()
    {
        $statusDefault = config('ppdb.status.calon_siswa.nonaktif');
        $result = StatusCasis::getDataById(Auth::user()->getDataCasisKu()->id_status_casis)->status;

        return $result ?? $statusDefault;
    }

    // User Mendapatkan data calon siswa
    public function getDataCasisKu()
    {
        $idKu = Auth::user()->id;
        if (Auth::user()->hasRole(config('ppdb.peran.casis.tk'))) {
            $result = CasisTk::where('id_user', $idKu)->first();
        } else if (Auth::user()->hasRole(config('ppdb.peran.casis.sd'))) {
            $result = CasisSd::where('id_user', $idKu)->first();
        } else if (Auth::user()->hasRole(config('ppdb.peran.casis.smp'))) {
            $result = CasisSmp::where('id_user', $idKu)->first();
        } else {
            $result = CasisSma::where('id_user', $idKu)->first();
        }

        return $result;
    }

    // User Mendapatkan data va siswa 
    public function getDataVaKu()
    {
        $idKu = Auth::user()->id;
        if (Auth::user()->hasRole(config('ppdb.peran.casis.tk'))) {
            $dataKu = CasisTk::where('id_user', $idKu)->first();
            $idVaKu = $dataKu->id_va_tk;
            $result = VaTk::where('id_va_tk', $idVaKu)->first();
        } else if (Auth::user()->hasRole(config('ppdb.peran.casis.sd'))) {
            $dataKu = CasisSd::where('id_user', $idKu)->first();
            $idVaKu = $dataKu->id_va_sd;
            $result = VaSd::where('id_va_sd', $idVaKu)->first();
        } else if (Auth::user()->hasRole(config('ppdb.peran.casis.smp'))) {
            $dataKu = CasisSmp::where('id_user', $idKu)->first();
            $idVaKu = $dataKu->id_va_smp;
            $result = VaSmp::where('id_va_smp', $idVaKu)->first();
        } else {
            $dataKu = CasisSma::where('id_user', $idKu)->first();
            $idVaKu = $dataKu->id_va_sma;
            $result = VaSma::where('id_va_sma', $idVaKu)->first();
        }

        return $result;
    }

    // User Mendapatkan data unit siswa
    public function getDataUnitKu()
    {
        $idKu = Auth::user()->id;
        // biaya formulir perunit
        if (Auth::user()->hasRole(config('ppdb.peran.casis.tk'))) {
            $result = Unit::where('nm_unit', 'TKIT')->first();
        } else if (Auth::user()->hasRole(config('ppdb.peran.casis.sd'))) {
            $result = Unit::where('nm_unit', 'SDIT')->first();
        } else if (Auth::user()->hasRole(config('ppdb.peran.casis.smp'))) {
            $result = Unit::where('nm_unit', 'SMPIT')->first();
        } else {
            $result = Unit::where('nm_unit', 'SMAIT')->first();
        }

        return $result;
    }
}
