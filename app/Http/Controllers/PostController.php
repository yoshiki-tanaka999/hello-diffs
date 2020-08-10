<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;

// ユーザーの議論参加関連情報のモデル
use App\Model\Post\Post;

// Post

class PostController extends Controller
{
    // 認証
    // public function __construct()
    // {
    // $this->middleware('auth');
    // }

    //登録 
    public function store(Request $request) {
    //バリデーション
    $validator = Validator::make($request->all(), [
        'title' => 'required|min:1|max:255',
        'description' => 'required|min:1|max:255',
        'img_url' => 'file','mimes:jpeg,png,jpg,bmb','max:2048',
    ]); 
    
    // バリデーション：エラー 
    // if ($validator->fails()) { 
    //     return redirect('/mypage')
    //     ->withInput()
    //     ->withErrors($validator); 
    // };
    
    // 画像ファイルアップロード
    if ($file = $request->file('img_url')) {
        $fileName = time() . $file->getClientOriginalExtension();
        $target_path = public_path('upload/');
        $file->move($target_path, $fileName);
    } else {
        $fileName = "";
    };
        // 本作成処理…
        $posts = new Post;
        $posts->participant_id = $request->participant_id;
        $posts->title = $request->title;
        $posts->description = $request->description;
        $posts->img_url = $fileName;
        $posts->published = $request->published;
        $posts->created_at; 
        $posts->save(); 
        return redirect('/');
    }
}