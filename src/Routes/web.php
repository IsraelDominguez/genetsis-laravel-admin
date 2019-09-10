<?php

Route::group(['middleware' => ['web']], function () {
    Route::prefix('admin')->group(function () {
        Route::group(['namespace' => 'Genetsis\Admin\Controllers'], function () {
            Route::get('home', 'HomeController@index')->name('adminhome');

            Route::group(['middleware' => ['permission:manage_users']], function () {
                Route::get('users/get', 'UserController@get')->name('users.api');
                Route::resource('users', 'UserController', [
                    'only' => ['index', 'edit', 'create', 'store', 'update', 'destroy', 'show'],
                    'names' => ['index' => 'users.home', 'show' => 'users.show']
                ]);
            });
        });
    });
});



