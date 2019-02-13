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

use App\Http\Middleware\HelloMiddleware;

// http://laravelsample.test のルーティング
Route::get('/', function () {
    return view('welcome');
});

// http://laravelsample.test/hello のルーティング
Route::get('hello', 'HelloController@index');
Route::post('hello', 'HelloController@post');

// http://laravelsample.test/hello/add のルーティング
Route::get('hello/add', 'HelloController@add');
Route::post('hello/add', 'HelloController@create');

// http://laravelsample.test/hello/edit?id=1 のルーティング
Route::get('hello/edit', 'HelloController@edit');
Route::post('hello/edit', 'HelloController@update');

// http://laravelsample.test/hello/del のルーティング
Route::get('hello/del', 'HelloController@del');
Route::post('hello/del', 'HelloController@remove');

// http://laravelsample.test/hello/show?id=1 のルーティング
Route::get('hello/show', 'HelloController@show');
