<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



// ------------ 投稿一覧画面 -----------------------------------
Route::get('/posts/index', 'PostController@index')->name('posts.index');


// ------------ create（募集投稿画面）------------------------------

Route::get('/posts/add', 'PostController@create')->name('posts.create');
Route::post('/posts/add', 'PostController@add')->name('posts.add');


// ------------ details（詳細画面）-----------------------------------
Route::get('/posts/details/{id}', 'PostController@detail')->name('posts.detail');


// ------------ edit（編集画面）-----------------------------------

Route::get('/edit/{id}', 'PostController@edit')->name('posts.edit');


// ------------ update（更新画面）-----------------------------------

Route::post('/update/{id}','PostController@update')->name('posts.update');


// ------------ delete（削除画面）----------------------------------

Route::post('/delete/{id}', 'PostController@delete')->name('posts.delete');

// ------------ 検索処理 -----------------------------------

Route::get('posts/search/{machine?}','PostController@search')->name('posts.search');


// ------------ 応募処理 -----------------------------------

Route::post('/posts/details/{id}','PostController@apply')->name('posts.apply');