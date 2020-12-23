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
    Route::get('alamat/api', 'AlamatController@datatableAlamatAPI')->name('alamat.api');
    Route::resource('alamat', 'AlamatController')->except(['create', 'show']);

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

    // Route tkva
    Route::get('tkva/api', 'TkvaController@datatableTkvaAPI')->name('tkva.api');
    Route::resource('tkva', 'TkvaController')->except(['create', 'show']);

    // Route sdva
    Route::get('sdva/api', 'SdvaController@datatableSdvaAPI')->name('sdva.api');
    Route::resource('sdva', 'SdvaController')->except(['create', 'show']);

    // Route smpva
    Route::get('smpva/api', 'SmpvaController@datatableSmpvaAPI')->name('smpva.api');
    Route::resource('smpva', 'SmpvaController')->except(['create', 'show']);

    // Route smava
    Route::get('smava/api', 'SmavaController@datatableSmavaAPI')->name('smava.api');
    Route::resource('smava', 'SmavaController')->except(['create', 'show']);
});


Route::group(['namespace' => 'Front'], function () {
    Route::get('/', 'IndexController@index');
});
