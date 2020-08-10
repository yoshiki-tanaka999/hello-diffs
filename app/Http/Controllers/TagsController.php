<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ユーザー関連情報のモデル
use App\Model\System\Post;
use App\Model\System\Tag;

class TagsController extends Controller
{
    // 認証
    // public function __construct()
    // {
    // $this->middleware('auth');
    // }

    // マイページのルーティング
    public function index() {
		return view('tags');
    }
}