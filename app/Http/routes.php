<?php

//Public routes and action. Available to admin, registered and temp users.
Route::group([
    'middleware' => \fooCart\Http\Middleware\UserRequiredMiddleware::class
], function () {
    Route::get('/', function () {
        return view('public.home');
    });

    Route::get('login', [
        'as' => 'public.login',
        'uses' => 'Auth\AuthController@show'
    ]);

    Route::post('login', [
        'as' => 'public.authenticate',
        'uses' => 'Auth\AuthController@login'
    ]);

    Route::get('register', [
        'as' => 'user.create',
        'uses' => 'UserController@Create'
    ]);

    //User account routes and actions. Available to admin and registered users.
    Route::group([
        'prefix' => 'account',
        'middleware' => \fooCart\Http\Middleware\RegisteredUserMiddleware::class
    ], function () {
        //Only registered users are allowed here
        Route::resource('/', AccountController::class);
    });
});



//Site administration login routes. All users are allowed here.
Route::group([
    'prefix' => 'admin',
], function () {
    Route::get('login', [
        'as' => 'admin.login',
        'uses' => 'AdminController@login'
    ]);

    Route::post('login', [
        'as' => 'admin.authenticate',
        'uses' => 'AdminController@authenticate'
    ]);

    //Site administration routes and actions. Available to admin users.
    Route::group([
        'middleware' => \fooCart\Http\Middleware\AdminUserMiddleware::class
    ], function () {
        Route::get('/', [
            'as' => 'admin.home',
            'uses' => 'AdminController@index'
        ]);
    });
});