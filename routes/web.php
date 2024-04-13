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

// プロフィール
Route::get('/profile','UsersController@profile');
Route::get('/users/{user}/profile','UsersController@profile');
// Route::get('/users/{user}/profile','UsersController@');

Route::get('/search','UsersController@search')->name('users.search');

Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');

// フォロー
Route::get('/users/{user}/follow', 'FollowsController@follow');
Route::get('/users/{user}/unfollow', 'FollowsController@unfollow');

// 投稿を押した時
Route::post('/posts', 'PostsController@create');
// 編集
Route::get('/update', 'PostsController@update');
Route::post('/update', 'PostsController@update')->name('posts.update');
// 削除
Route::get('/post/{id}/delete', 'PostsController@delete');
});

// ログアウトする
Route::get('/logout', 'Auth\LoginController@logout');
