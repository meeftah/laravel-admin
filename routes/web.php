<?php

Route::redirect('/', '/dashboard/home');

Auth::routes(['register' => false]);

Route::group(['namespace' => 'Dashboard', 'middleware' => ['auth'], 'prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('/home', 'BerandaController@index')->name('home');

    // Route Hak Akses
    Route::get('permissions/api', 'PermissionsController@datatablePermissionsAPI')->name('permissions.api');
    Route::resource('permissions', 'PermissionsController')->except(['create', 'show']);

    // Route Peran
    Route::get('roles/api', 'RolesController@datatableRolesAPI')->name('roles.api');
    Route::resource('roles', 'RolesController');

    // Route Users
    Route::get('users/api', 'UsersController@datatableUsersAPI')->name('users.api');
    Route::resource('users', 'UsersController');

});
