<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post\System\chat;
use App\Model\Post\post;
use App\Model\User\User;
use Auth;
use App\Events\MessageCreated;

use Validator;

class ApiChatController extends Controller
{

    public function index() 
    {   
        // 新着順にメッセージ一覧を取得
        return \App\Model\Post\System\Chat::orderBy('id');
    }

    // public function create(Request $request) 
    // { 
    //     // メッセージを登録
    //     \App\Chat::create([
    //         'content' => $request->chat
    //     ]);
    
    // }

    public function store(Request $request, User $user)
    {
        // ユーザーID
        $user = Auth::user();

        $chat=new Chat();
        // $chat->content=$request->input('content');
        // $chat->post_id=$request->input('post_id');       
        $chat->content=$request->content;
        $chat->post_id=$request->post_id;
        $chat->user_id = $user->id;
        $chat->save();

        // Pusher接続
        event(new MessageCreated($chat));

        // Postモデルと紐付けができていないので、以下、createで試す
        // Chat::create($request->all());
    }

    public function create(Request $request, Post $post)
    {
        $chat=new Chat();
        // $chat->content=$request->input('content');
        // $chat->post_id=$request->input('post_id');
        $chat->content=$request->content;
        $chat->post_id=$post->id;
        $chat->save();
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
