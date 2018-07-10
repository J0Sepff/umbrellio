<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('post','PostController@index');

Route::get('post/{id}','PostController@show');

Route::post('post/create','PostController@create');

Route::post('rating','RatingController@create');
