<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/tests', 'ApiPostController');

Route::apiResource('/images', 'ApiImageController');

// // URL生成テスト(Post投稿ごとのidでページを作成できるようにしたい)
Route::group(['middleware' => 'api'], function() {
    Route::get('posts', 'ApiPostSelectController@index');
});