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

Route::get('/','StaticPageController@home')->name('home');
Route::get('/help','StaticPageController@help')->name('help');
Route::get('/about','StaticPageController@about')->name('about');
Route::resource('users', 'UserController');
Route::get('login','SessionController@create')->name('login');
Route::post('login','SessionController@store')->name('login');
Route::delete('logout','SessionController@destroy')->name('logout');
Route::get('signup/confirm/{token}','UserController@confirmEmail')->name('confirm.email');


Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');