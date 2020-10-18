<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post\Post;

// 画像アップロードできないver
use App\Http\Requests\StorePost;

use Validator;

class ApiPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    // public function store(Request $request)
    {
        // 画像アップロードできないver
        Post::create($request->all());

        // 画像アップロードver
        // $this->validate($request, [
        //     'title' => 'required|max:120',
        //     'description' => 'required|max:255',
        //     'img_url' => 'required|image'
        // ], [
        //     'title.required' => 'タイトルを入力して下さい',
        //     'title.max' => '120文字以内で入力して下さい',
        //     'title.required' => 'タイトルを入力して下さい',
        //     'title.max' => '255文字以内で入力して下さい',
        //     'img_url.required' => '画像が選択されていません',
        //     'img_url.image' => '画像ファイルではありません',
        // ]);

        // if (request()->file) {
        //     $file_name = time() . '.' . request()->file->getClientOriginalName();
        //     request()->file->storeAs('public', $file_name);

        //     $image = new Image();
        //     $image->path = 'storage/' . $file_name;
        //     $image->title = $request->title;
        //     $image->description = $request->description;
        //     $image->save();

        //     return ['success' => '登録しました!'];
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = [
            'title' => $request->title,
            'description' => $request->description,
            'img_url' => $request->img_url,
        ];
        Post::where('id', $id)->update($update);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id', $id)->delete();
    }
}
