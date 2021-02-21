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
    Route::post('info-tambahan/delete/ikon/', 'InfoTambahanController@deleteIkon')->name('info-tambahan.delete.ikon');
    
    // Route Daftar Info Tambahan
    Route::get('info-tambahan/detail/api/{id}', 'InfoTambahanDetailController@datatableAPI')->name('info-tambahan-detail.api');
    Route::get('info-tambahan/detail/{id}', 'InfoTambahanDetailController@index')->name('info-tambahan-detail.index');
    Route::get('info-tambahan/detail/{id}/detail', 'InfoTambahanDetailController@show')->name('info-tambahan-detail.show');
    Route::get('info-tambahan/detail/create/{id}', 'InfoTambahanDetailController@create')->name('info-tambahan-detail.create');
    Route::post('info-tambahan/detail', 'InfoTambahanDetailController@store')->name('info-tambahan-detail.store');
    Route::get('info-tambahan/detail/{id}/edit', 'InfoTambahanDetailController@edit')->name('info-tambahan-detail.edit');
    Route::put('info-tambahan/detail/{id}', 'InfoTambahanDetailController@update')->name('info-tambahan-detail.update');
    Route::delete('info-tambahan/detail/{id}', 'InfoTambahanDetailController@destroy')->name('info-tambahan-detail.destroy');
    Route::post('info-tambahan/detail/delete/ikon/', 'InfoTambahanDetailController@deleteIkon')->name('info-tambahan-detail.delete.ikon');
});
