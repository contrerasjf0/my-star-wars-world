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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'CharactersController@index');
Route::post('/characters', 'CharactersController@store')->name('store');
Route::get('/characters/create', 'CharactersController@create')->name('create');
Route::get('/characters/{id}', 'CharactersController@showAPI')->name('show');
