<?php

//Public routes
Route::group(['middleware' => 'userRequired'], function ()
{
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('login', [
        'as' => 'login.show',
        'uses' => 'Auth\AuthController@show'
    ]);

    Route::post('login', [
        'as' => 'login.authenticate',
        'uses' => 'Auth\AuthController@login'
    ]);

    Route::get('register', [
        'as' => 'user.create',
        'uses' => 'UserController@Create'
    ]);
});

