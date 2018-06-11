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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login','Login\LoginController@index');
Route::post('login','Login\LoginController@login');
Route::any('index','Login\IndexController@index');
Route::any('user.del','Login\IndexController@del');
Route::any('user.save','Login\IndexController@save');
Route::any('user.update','Login\IndexController@update');
Route::any('user.add','Login\IndexController@add');

Route::any('user.addsave','Login\IndexController@addsave');

//留言板
Route::any('board.board','Login\BoardController@index');
Route::any('board.add','Login\BoardController@add');
Route::any('board.del','Login\BoardController@del');