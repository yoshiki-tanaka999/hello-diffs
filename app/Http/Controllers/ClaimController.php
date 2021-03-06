<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Post\System\Claim;
use Validator;


class ClaimController extends Controller
{
        //投稿 profileページに、投稿とツイートの変数を渡す
        public function index() 
        {
            $claims_pros = Claim::orderBy('created_at', 'desc')->where('claim_flag', 0)->get();
            $claims_cons = Claim::orderBy('created_at', 'desc')->where('claim_flag', 1)->get();
            
            return view('layout.discussion', [ 
                'claims_pros' => $claims_pros,
                'claims_cons' => $claims_cons,                
            ]);
        }

        // public function index_cons() 
        // {
        //     $claims_cons = Claim::orderBy('created_at', 'desc')->where('claim_flag', 1)->get();
            
        //     return view('component.claim_cons', [ 
        //         'claims' => $claims_cons,
        //     ]);
        // }

        //登録 
        public function store(Request $request) {
            //バリデーション
            $validator = Validator::make($request->all(), [
                'content' => 'required|min:1|max:255',
            ]); 
            
            
            //バリデーション：エラー 
            if ($validator->fails()) { 
                return redirect('/discuss/{post}')
                ->withInput()
                ->withErrors($validator); 
            } 
                // 本作成処理…
                $claims = new Claim;
                $claims->participant_id = $request->participant_id;
                $claims->post_id = $request->post_id;
                $claims->claim_parent_id = $request->claim_parent_id;
                $claims->content = $request->content;
                $claims->claim_flag = $request->claim_flag;
                $claims->created_at; 
                $claims->save(); 
                return redirect('/discuss/{post}');
        }
}

