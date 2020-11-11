<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post\System\Claim;
use App\Model\Post\Evaluation\Claim_like;
use App\Model\User\User;

class ApiClaimLikeController extends Controller
{
    public function like(Claim $claim, Request $request)
    {
      $like = Claim_like::create(['claim_id' => $claim->id, 'user_id' => $request->user_id]);

      $likeCount = count(Claim_like::where('claim_id', $claim->id)->get());

      return response()->json(['likeCount' => $likeCount]);
    }

    public function unlike(Claim $claim, Request $request)
    {
      $like = Claim_like::where('user_id', $request->user_id)->where('claim_id', $claim->id)->first();
      $like->delete();

      $likeCount = count(Claim_like::where('claim_id', $claim->id)->get());

      return response()->json(['likeCount' => $likeCount]);
    }
}
