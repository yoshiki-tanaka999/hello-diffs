<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Model\Post\Post;

class LayoutController extends Controller
{
    public function index() {
      $posts = Post::orderBy('created_at', 'desc')->get();
      return view('layout.index', [ 'posts' => $posts ]);
    }
}
