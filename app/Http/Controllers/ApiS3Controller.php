<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use League\Flysystem\AwsS3v3\AwsS3Adapter as S3Adapter;
use App\Model\Post\Post;
use App\Model\User\User;
use Auth;

use Validator;

class ApiS3Controller extends Controller
{

    public function index()
    {
        // 変更前
        // return Post::all();

        // S3バージョン
        $post = Post::all();
        $image = Storage::disk('s3')->url($post->img_url);

        // 変更後
        return Post::orderBy('created_at', 'desc')->get();

    }

    public function store(Request $request, User $user)
    {

    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
