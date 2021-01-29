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
    Route::get('info-tambahan/create/sub', 'InfoTambahanController@createSub')->name('info-tambahan.create-sub');
    Route::resource('info-tambahan', 'InfoTambahanController');

});
