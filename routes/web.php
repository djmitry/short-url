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


Route::get('/', 'ShortUrlController@index')->name('shortUrl');
Route::post('/', 'ShortUrlController@store')->name('shortUrl.store');
Route::get('su{url}', 'ShortUrlController@follow');