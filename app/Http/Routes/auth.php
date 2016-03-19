<?php

Route::get('/', function () {
    return redirect()->route('auth.login');
});

Route::group(['as' => 'auth.', 'namespace' => 'Auth', 'prefix' => 'auth'], function () {
    Route::get('login', ['uses' => 'AuthController@login', 'as' => 'login']);
    Route::get('google', ['uses' => 'AuthController@google', 'as' => 'google']);
    Route::get('redirect', ['uses' => 'AuthController@redirect', 'as' => 'redirect']);
});
