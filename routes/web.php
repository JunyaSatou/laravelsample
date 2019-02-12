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

// http://laravelsample.test のルーティング
Route::get('/', function () {
    return view('welcome');
});

// http://laravelsample.test/hello のルーティング
Route::get('hello', 'HelloController@index');

