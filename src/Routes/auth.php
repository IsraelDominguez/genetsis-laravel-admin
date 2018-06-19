<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['web']], function () {
    Route::prefix('admin')->group(function () {

        // Login Routes
        Route::get('login', 'Genetsis\Admin\Controllers\Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Genetsis\Admin\Controllers\Auth\LoginController@login');
        Route::post('logout', 'Genetsis\Admin\Controllers\Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        Route::get('register', 'Genetsis\Admin\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'Genetsis\Admin\Controllers\Auth\RegisterController@register');

        // Password Reset Routes..
        Route::get('password/reset', 'Genetsis\Admin\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Genetsis\Admin\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Genetsis\Admin\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Genetsis\Admin\Controllers\Auth\ResetPasswordController@reset');

    });
});