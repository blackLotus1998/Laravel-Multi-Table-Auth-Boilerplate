<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('User')->group(function (){
    Route::get('home', 'HomeController@index')->name('home');
    // Login & Logout
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    // Password
    Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
    Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');
    // Password Reset
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
});

Route::namespace('Admin')->prefix('admin')->group(function (){
    Route::get('home', 'HomeController@index')->name('admin.home')->middleware('auth:admin');
    // Login & Logout
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
});

