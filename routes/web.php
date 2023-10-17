<?php

use App\Http\Controllers\PostsController;

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


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

// 新規取得ページ
Route::get('/register', 'Auth\RegisterController@registerView');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');


Route::group(['middleware' => 'auth'], function() {

//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@index');

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');

// 投稿フォーム
// 投稿を押した時
Route::get('/posts', 'PostsController@index');
Route::post('/posts', 'PostsController@store');
});

// ログアウトする
Route::get('/logout', 'Auth\LoginController@logout');
