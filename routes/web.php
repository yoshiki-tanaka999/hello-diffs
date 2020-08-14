<?php

use Illuminate\Support\Facades\Route;



// テスト
// Route::get('/', function () {
//     return view('welcome');
// });

// ★トップページ★
Route::resource('/', 'LayoutController');


// ★トップページテスト★
Route::get('/index', 'ExploreController@index');

// トップページ＠Post投稿 
Route::post('/post', 'PostController@store');

// ★マイページ★
Route::get('/mypage', 'UserController@index');

// ★タグページ★
Route::get('/tags', 'TagsController@index');

// ★ディスカッションページ★
Route::get('/discuss/{post}', 'ClaimController@index');

// ディスカッションページ＠意見投稿 
Route::post('/claim', 'ClaimController@store');



//投稿確認ページ
// Route::get('/discuss/{post}', 'ClaimController@detail')->name('claims.detail');

// API連携テスト
Route::get('/testapi', 'TestApiController@index');

// 画像アップロードテスト
Route::get('/image', 'ImageController@index');