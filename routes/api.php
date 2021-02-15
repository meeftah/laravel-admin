<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\v1', 'as' => 'api.'], function () {
    // ----------- Login
    Route::post('login', 'Auth\LoginController@login')->name('auth.login');

    // ----------- Register
    Route::post('register', 'Auth\RegisterController@register')->name('auth.register');

    // ----------- Modul 2: Info Tambahan
    Route::get('modul2', 'Dashboard\Modul2Controller@index')->name('modul2.index');
});
