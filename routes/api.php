<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('/images', 'ApiImageController');

// // URL生成テスト(Post投稿ごとのidでページを作成できるようにしたい)
Route::group(['middleware' => 'api'], function() {
    Route::get('posts', 'ApiPostSelectController@index');
});