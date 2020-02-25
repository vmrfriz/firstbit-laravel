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

Route::get('/', 'ReviewsController@index'); //->only(['index', 'store', 'edit', 'update']);
Route::post('/', 'ReviewsController@store');
Route::get('/edit/{review}', 'ReviewsController@edit')->middleware('auth');
Route::put('/edit/{review}', 'ReviewsController@update')->middleware('auth');

Auth::routes(['register' => false, 'request' => false, 'reset' => false]);
