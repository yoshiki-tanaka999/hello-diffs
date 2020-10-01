<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post\System\chat;

use Validator;

class ApiChatController extends Controller
{

    public function index() 
    {   
        // 新着順にメッセージ一覧を取得
        return \App\Model\Post\System\Chat::orderBy('id', 'desc')->get();
    }

    // public function create(Request $request) 
    // { 
    //     // メッセージを登録
    //     \App\Chat::create([
    //         'content' => $request->chat
    //     ]);
    
    // }

    public function store(Request $request)
    {
        // 画像アップロードできないver
        // Chat::create($request->all());

        // メッセージを登録
        // \App\Model\Post\System\Chat::create([
        //     'content' => $request->chat
        // ]);

        Chat::create($request->all());
    }


    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $update = [
            'title' => $request->title,
            'description' => $request->description,
            'img_url' => $request->img_url,
        ];
        Claim::where('id', $id)->update($update);
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
