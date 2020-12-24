<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::group(['namespace' => 'Dashboard', 'middleware' => ['auth'], 'prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::redirect('/', '/dashboard/home');
    Route::get('/home', 'DashboardController@index')->name('home');

    // Route Hak Akses
    Route::get('permissions/api', 'PermissionsController@datatablePermissionsAPI')->name('permissions.api');
    Route::resource('permissions', 'PermissionsController')->except(['create', 'show']);

    // Route Peran
    Route::get('roles/api', 'RolesController@datatableRolesAPI')->name('roles.api');
    Route::resource('roles', 'RolesController');


    // Route Users
    Route::get('users/api', 'UsersController@datatableUsersAPI')->name('users.api');
    Route::resource('users', 'UsersController');

    // Route Penghasilan
    Route::get('penghasilan/api', 'PenghasilanController@datatablePenghasilanAPI')->name('penghasilan.api');
    Route::resource('penghasilan', 'PenghasilanController')->except(['create', 'show']);

    // Route Pekerjaan
    Route::get('pekerjaan/api', 'PekerjaanController@datatablePekerjaanAPI')->name('pekerjaan.api');
    Route::resource('pekerjaan', 'PekerjaanController')->except(['create', 'show']);

    // Route Pendidikan
    Route::get('pendidikan/api', 'PendidikanController@datatablePendidikanAPI')->name('pendidikan.api');
    Route::resource('pendidikan', 'PendidikanController')->except(['create', 'show']);

    // Route Agama
    Route::get('agama/api', 'AgamaController@datatableAgamaAPI')->name('agama.api');
    Route::resource('agama', 'AgamaController')->except(['create', 'show']);

    // Route Alamat
    Route::get('jarak/api', 'JarakController@datatableJarakAPI')->name('jarak.api');
    Route::resource('jarak', 'JarakController')->except(['create', 'show']);

    // Route kondisibelajar
    Route::get('kondisibelajar/api', 'KondisibelajarController@datatableKondisibelajarAPI')->name('kondisibelajar.api');
    Route::resource('kondisibelajar', 'KondisibelajarController')->except(['create', 'show']);

    // Route bcquran
    Route::get('bcquran/api', 'BcquranController@datatableBcquranAPI')->name('bcquran.api');
    Route::resource('bcquran', 'BcquranController')->except(['create', 'show']);

    // ------------------------------------- PROFIl SISWA
    Route::get('calon-siswa/profil/{id}', 'ProfilCalonSiswaController@profil')->name('calonsiswa.profil');

    // Route waktutmph
    Route::get('waktutmph/api', 'WaktutmphController@datatableWaktutmphAPI')->name('waktutmph.api');
    Route::resource('waktutmph', 'WaktutmphController')->except(['create', 'show']);

    // Route jenisdokumen
    Route::get('jenisdokumen/api', 'JenisdokumenController@datatableJenisdokumenAPI')->name('jenisdokumen.api');
    Route::resource('jenisdokumen', 'JenisdokumenController')->except(['create', 'show']);

    // Route tkva
    Route::get('va/tk/api', 'VaTkController@datatableVaTkAPI')->name('va.tk.api');
    Route::resource('va/tk', 'VaTkController', ['names' => 'va.tk'])->except(['create', 'show']);

    // Route sdva
    Route::get('va/sd/api', 'VaSdController@datatableVaSdAPI')->name('va.sd.api');
    Route::resource('va/sd', 'VaSdController', ['names' => 'va.sd'])->except(['create', 'show']);

    // Route smpva
    Route::get('va/smp/api', 'VaSmpController@datatableVaSmpAPI')->name('va.smp.api');
    Route::resource('va/smp', 'VaSmpController', ['names' => 'va.smp'])->except(['create', 'show']);

    // Route smava
    Route::get('va/sma/api', 'VaSmaController@datatableVaSmaAPI')->name('va.sma.api');
    Route::resource('va/sma', 'VaSmaController', ['names' => 'va.sma'])->except(['create', 'show']);
});


Route::group(['namespace' => 'Front'], function () {
    Route::get('/', 'IndexController@index');
});
