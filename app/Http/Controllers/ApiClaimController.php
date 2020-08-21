<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post\claim;


use Validator;

class ApiClaimController extends Controller
{

    public function index()
    {
        
        return Claim::all();
    }

    public function store(Request $request)
    {
        // 画像アップロードできないver
        Claim::create($request->all());
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
