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

    // User Mendapatkan data status berdasarkan id nya
    public function getStatusCasisKu()
    {
        $idKu = Auth::user()->id;
        $statusDefault = 'Non Aktif';
        if (Auth::user()->hasRole('Calon Siswa TK')) {
            $dataKu = CasisTk::where('id_user', $idKu)->first();
        } else if (Auth::user()->hasRole('Calon Siswa SD')) {
            $dataKu = CasisSd::where('id_user', $idKu)->first();
        } else if (Auth::user()->hasRole('Calon Siswa SMP')) {
            $dataKu = CasisSmp::where('id_user', $idKu)->first();
        } else {
            $dataKu = CasisSma::where('id_user', $idKu)->first();
        }

        if ($dataKu) {
            $idStatusKu = $dataKu->id_status_casis;
            $result = StatusCasis::getDataById($idStatusKu)->status ?? $statusDefault;
        } else {
            $result = $statusDefault;
        }

        return $result;
    }
}
