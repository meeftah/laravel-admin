<?php

Auth::routes(['register' => false]);

Route::group(['namespace' => 'Dashboard', 'middleware' => ['auth'], 'prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::redirect('/', '/dashboard/home');
    Route::get('/home', 'DashboardController@index')->name('home');

    // Route Hak Akses
    Route::resource('permissions', 'PermissionsController')->except(['create', 'show']);
    Route::get('permissions/api', 'PermissionsController@datatablePermissionsAPI')->name('permissions.api');

    // Route Pengguna
    Route::resource('roles', 'RolesController');
    Route::get('roles/api', 'RolesController@datatableRolesAPI')->name('roles.api');

    // Route Users
    Route::resource('users', 'UsersController');
    Route::get('users/api', 'UsersController@datatableUsersAPI')->name('users.api');

    // Route Penghasilan
    Route::resource('penghasilan', 'PenghasilanController')->except(['create', 'show']);
    Route::get('penghasilan/api', 'PenghasilanController@datatablePenghasilanAPI')->name('penghasilan.api');
});


Route::group(['namespace' => 'Front'], function () {
    Route::get('/', 'IndexController@index');
});