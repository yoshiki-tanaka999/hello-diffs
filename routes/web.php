<?php

use Illuminate\Support\Facades\Route;


// Tweetテスト
// Route::get('/tweet/index', 'TweetController@index');
// Route::get('/tweet', 'TweetController@fetch');
// Route::post('/tweet', 'TweetController@store');
// Route::post('/tweet/like', 'TweetController@postLike');
// Route::post('/tweet/report', 'TweetController@postReport');
// Route::post('/tweet/impression', 'TweetController@postImpression');


// 以下を記述すると、「/」以降のルーティングには、全てVue-routerが適用される
// Route::get('/{any}', function () {
//     return view('index');
// })->where('any', '.*');

// ★トップページテスト★
// Route::get('/', 'ExploreController@index');

// ★トップページバージョンアップ★
// 以下の処理で、bladeではなく、Vue−routerのルーティングになる
// (つまり実質必要なくなる)
Route::get('/{any}', 'ExploreController@index')->where('any', '.*');


// トップページ＠Post投稿 
// Route::post('/post', 'PostController@store');

// ★マイページ★
// Route::get('/mypage', 'UserController@index');

// ★タグページ★
// Route::get('/tags', 'TagsController@index');

// ★ディスカッションページ★
// $post = App\Model\Post\Post::find(1);
// Route::get('/discuss/{$post->id}', 'ClaimController@index');

// ディスカッションページ＠意見投稿 
// Route::post('/claim', 'ClaimController@store');



//投稿確認ページ
// Route::get('/discuss/{post}', 'ClaimController@detail')->name('claims.detail');

// API連携テスト
// Route::get('testapi', 'TestApiController@index');

// 画像アップロードテスト
// Route::get('/image', 'ImageController@index');

// URL生成テスト(Post投稿ごとのidでページを作成できるようにしたい)
// Route::get('/discuss/{any}', function () {
//     return view('testapi');
// })->where('any', '.*');

