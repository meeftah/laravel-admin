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
});


Route::group(['namespace' => 'Front'], function () {
    Route::get('/', 'IndexController@index');
});
