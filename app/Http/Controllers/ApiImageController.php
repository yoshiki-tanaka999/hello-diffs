<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post\Post;
use App\Model\User\User;
use Auth;

use Validator;

class ApiImageController extends Controller
{

    public function index()
    {
        // 変更前
        // return Post::all();
        
        // 変更後
        return Post::orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request, User $user)
    {
        // 画像アップロードver
        $this->validate($request, [
            'title' => 'required|max:120',
            'description' => 'required|max:255',
            'file' => 'required|image'
        ], [
            'title.required' => 'タイトルを入力して下さい',
            'title.max' => '120文字以内で入力して下さい',
            'title.required' => 'タイトルを入力して下さい',
            'title.max' => '255文字以内で入力して下さい',
            'file.required' => '画像が選択されていません',
            'file.image' => '画像ファイルではありません',
        ]);

        // S3導入前のコード
        // if (request()->file) {
        //     $file_name = time() . '.' . request()->file->getClientOriginalName();
        //     request()->file->storeAs('public', $file_name);

        //     $user = Auth::user();

        //     $image = new Post();
        //     $image->user_id = $user->id;
        //     $image->img_url = 'https://hello-diffs2.herokuapp.com/public/storage/' . $file_name;
        //     $image->title = $request->title;
        //     $image->description = $request->description;
            
        //     $image->save();
            
        //     return ['success' => '登録しました!'];
        // }

        // S3導入後のコード
        if (request()->file) {
            // $file_name = time() . '.' . request()->file->getClientOriginalName();
            // request()->file('file');
            // $path = Storage::disk('s3')->put('/img_url', $file_name, 'public');
            $file=$params['photo'];
            $path = Storage::disk('s3')->put('/img_url', $file, 'public');

            $user = Auth::user();

            $image = new Image();
            $image->user_id = $user->id;            
            $image->img_url = $path;
            $image->title = $request->title;
            $image->description = $request->description;
            $image->save();

            dd($file_name);
            dd($path);
            dd($image);

            return ['success' => '登録しました!'];
        }
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
