<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

// ユーザー関連情報のモデル
use App\Model\User\User;
use App\Model\User\Follow;
use App\Model\User\Vote;

// ユーザーの議論参加関連情報のモデル
use App\Model\Evaluation\Chat_like;
use App\Model\Evaluation\Chat_love;
use App\Model\Evaluation\Claim_like;
use App\Model\Evaluation\Claim_love;

// Post

class UserController extends Controller
{
    // 認証
    // public function __construct()
    // {
    // $this->middleware('auth');
    // }

    // マイページのルーティング
    public function index() {
		return view('mypage');
    }

    //登録 
    public function post_store(Request $request) {
      //バリデーション
      $validator = Validator::make($request->all(), [
          'title' => 'required|min:1|max:255',
          'description' => 'required|min:1|max:255',
          'img_url' => 'image|file',
      ]); 
      
      // バリデーション：エラー 
      // if ($validator->fails()) { 
      //     return redirect('/mypage')
      //     ->withInput()
      //     ->withErrors($validator); 
      // };
      
      // 画像ファイルアップロード
      if ($file = $request->file('img_url')) {
        $fileName = time() . $file->getClientOriginalName();
        $target_path = public_path('uploads/');
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
          $posts->publishd = $request->published;
          $posts->created_at; 
          $posts->save(); 
          return redirect('/');
    }
}