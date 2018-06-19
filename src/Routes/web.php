<?php

Route::group(['middleware' => ['web']], function () {
    Route::prefix('admin')->group(function () {
        Route::group(['namespace' => 'Genetsis\Admin\Controllers'], function () {
            Route::get('home', 'HomeController@index')->name('adminhome');
        });
    });
});



