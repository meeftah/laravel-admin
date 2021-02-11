<?php

Route::redirect('/', '/dashboard/home');

Auth::routes(['register' => false]);

Route::group(['namespace' => 'Dashboard', 'middleware' => ['auth'], 'prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('/home', 'BerandaController@index')->name('home');

    // Route Hak Akses
    Route::get('permissions/api', 'PermissionsController@datatableAPI')->name('permissions.api');
    Route::resource('permissions', 'PermissionsController')->except(['create', 'show']);

    // Route Peran
    Route::get('roles/api', 'RolesController@datatableAPI')->name('roles.api');
    Route::resource('roles', 'RolesController');

    // Route Users
    Route::get('users/api', 'UsersController@datatableAPI')->name('users.api');
    Route::resource('users', 'UsersController');

    // Route Info Tambahan
    Route::get('info-tambahan/api', 'InfoTambahanController@datatableAPI')->name('info-tambahan.api');
    Route::resource('info-tambahan', 'InfoTambahanController');
    Route::post('info-tambahan/delete/gambar/', 'InfoTambahanController@deleteGambar')->name('info-tambahan.delete.gambar');
    
    // Route Daftar Info Tambahan
    Route::get('info-tambahan/daftar/api', 'InfoTambahanDaftarController@datatableAPI')->name('info-tambahan-daftar.api');
    Route::get('info-tambahan/daftar/{id}', 'InfoTambahanDaftarController@index')->name('info-tambahan-daftar.index');
    Route::get('info-tambahan/daftar/create/{id}', 'InfoTambahanDaftarController@create')->name('info-tambahan-daftar.create');
    Route::post('info-tambahan/daftar/create/{id}', 'InfoTambahanDaftarController@store')->name('info-tambahan-daftar.store');
    Route::delete('info-tambahan/daftar/{id}', 'InfoTambahanDaftarController@destroy')->name('info-tambahan-daftar.destroy');
});
