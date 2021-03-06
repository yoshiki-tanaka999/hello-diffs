<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post\System\Claim;
use App\Model\Post\Post;
use App\Model\User\User;
use Auth;

use Validator;

class ApiClaimLayerController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request, User $user)
    {
        // ユーザーID
        $user = Auth::user();

        $claim=new Claim();
        $claim->user_id = $user->id;
        
        $claim->post_id= $request->post_id;
        $claim->claim_upper_id= $request->claim_upper_id;        
        $claim->claim_level = $request->claim_level;
        $claim->claim_flag = $request->claim_flag;
        $claim->content= $request->content;
        $claim->save();
    }


    public function show($id)
    {
        $claim = Claim::with('claim_outputs')->find($id);
        return $claim;
    }

    public function update(Request $request, $id)
    {
        // $update = [
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'img_url' => $request->img_url,
        // ];
        // Claim::where('id', $id)->update($update);
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
