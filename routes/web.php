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

// http://laravelsample.test/hello/show?name=hanako のルーティング
Route::get('hello/show', 'HelloController@show');

// http://laravelsample.test/person のルーティング
Route::get('person', 'PersonController@index');

// http://laravelsample.test/person/find のルーティング
Route::get('person/find', 'PersonController@find');
Route::post('person/find', 'PersonController@search');

// http://laravelsample.test/person/add のルーティング
Route::get('person/add', 'PersonController@add');
Route::post('person/add', 'PersonController@create');

// http://laravelsample.test/person/edit のルーティング
Route::get('person/edit', 'PersonController@edit');
Route::post('person/edit', 'PersonController@update');

// http://laravelsample.test/person/del?id=1 のルーティング
Route::get('person/del', 'PersonController@delete');
Route::post('person/del', 'PersonController@remove');

// http://laravelsample.test/board のルーティング
Route::get('board', 'BoardController@index');

// http://laravelsample.test/board/add のルーティング
Route::get('board/add', 'BoardController@add');
Route::post('board/add', 'BoardController@create');

// http://laravelsample.test/rest のルーティング
Route::resource('rest', 'RestappController');

// http://laravelsample.test/hello/rest のルーティング
Route::get('hello/rest', 'HelloController@rest');

// http://laravelsample.test/hello/session のルーティング
Route::get('hello/session', 'HelloController@ses_get');
Route::post('hello/session', 'HelloController@ses_put');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
