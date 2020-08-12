<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post\post;

use Validator;

class ApiImageController extends Controller
{

    public function index()
    {
        return Post::all();
    }

    public function store(Request $request)
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

        if (request()->file) {
            $file_name = time() . '.' . request()->file->getClientOriginalName();
            request()->file->storeAs('public', $file_name);

            $image = new Post();
            $image->img_url = 'storage/' . $file_name;
            $image->title = $request->title;
            $image->description = $request->description;
            $image->save();

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
