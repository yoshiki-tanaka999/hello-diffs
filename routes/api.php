<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ログイン認証関連
Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    // Refresh the JWT Token
    Route::get('refresh', 'AuthController@refresh');
    Route::middleware('auth:api')->group(function () {
        // Get user info
        Route::get('user', 'AuthController@user');
        // Logout user from application
        Route::post('logout', 'AuthController@logout');
    });
});



// 元々のコード
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/tests', 'ApiPostController');

// 投稿データ
Route::apiResource('/images', 'ApiImageController');
// チャットデータ
Route::apiResource('/chat', 'ApiChatController');

// Route::post('/posts/{post}/chat', 'ApiChatController@create');

// Route::apiResource('/posts', 'ApiPostSelectController');

// これか
Route::get('/posts', 'ApiPostSelectController@index');
Route::get('/posts/{post}', 'ApiPostSelectController@show');

// こっち
// // URL生成テスト(Post投稿ごとのidでページを作成できるようにしたい)
// Route::group(['middleware' => 'api'], function() {
//     Route::get('posts', 'ApiPostSelectController@index');
//     Route::get('/posts/{post}', 'ApiPostSelectController@show');
// });