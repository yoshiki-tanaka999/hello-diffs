<?php

namespace App\Http\Services;

use App\Model\Post\System\Claim;
use Illuminate\Support\Facades\Auth;
use App\RedisModel;

class ClaimService
{

    public function extractShowClaims($fetchedClaimIdList, $page)
    {
        $limit = 10;
        $offset = $page * $limit;
        $claims = Claim::orderBy('created_at', 'desc')->offset($offset)->take($limit)->get();
        if (is_null($claims)) {
            return [];
        }

        if (is_null($fetchedClaimIdList)) {
            return $claims;
        }

        $user = Auth::user();
        $claimIdList = $claims->pluck('id')->toArray();
        $likedClaimIdList = RedisModel::getActionToClaimPerUser(config('claimt.USER_ACTION.LIKE'), $user->id, $claimIdList);
        // $reportedClaimIdList = RedisModel::getActionToClaimPerUser(config('claim.USER_ACTION.REPORT'), $user->id, $claimIdList);
        // $viewedClaimIdList = RedisModel::getActionToClaimPerUser(config('claim.USER_ACTION.IMPRESSION'), $user->id, $claimIdList);

        $showableClaims = [];
        foreach ($claims as $index => $claim) {
            if (!in_array($claim->id, $fetchedClaimIdList)) {
                $claim->is_liked = $likedClaimIdList[$index];
                $claim->is_reported = $reportedClaimIdList[$index];
                $claim->is_viewed = $viewedClaimIdList[$index];
                $showableClaims[] = $claim;
            }
        }

        return $showableClaims;
    }


    // public function saveTweet($postedTweet)
    // {
    //     $user = Auth::user();
    //     $tweet = new Tweet();
    //     $tweet->user_id = $user->id;
    //     $tweet->nickname = $user->name;
    //     $tweet->tweet = $postedTweet['tweet'];
    //     $tweet->save();

    //     return $tweet->tweet;
    // }

    public function updateLikeCount($claimId, $likePushed)
    {
        $user = Auth::user();

        if ($likePushed) {
            if (RedisModel::setActionToClaimPerUser(config('claim.USER_ACTION.LIKE'), $user->id, $claimId, $likePushed)) {
                RedisModel::incrClaimLikeCount($claimId);
            }
        }
        if (!$likePushed) {
            if (RedisModel::delActionToClaimPerUser(config('claim.USER_ACTION.LIKE'), $user->id, $claimId, $likePushed)) {
                RedisModel::decrClaimLikeCount($claimId);
            }
        }

        return $likePushed;
    }

    // public function updateReportCount($tweetId, $reportPushed)
    // {
    //     $user = Auth::user();

    //     if ($reportPushed) {
    //         if (RedisModel::setActionToTweetPerUser(config('tweet.USER_ACTION.REPORT'), $user->id, $tweetId, $reportPushed)) {
    //             Tweet::whereId($tweetId)->increment('report_count');
    //         }
    //     }
    //     if (!$reportPushed) {
    //         if (RedisModel::delActionToTweetPerUser(config('tweet.USER_ACTION.REPORT'), $user->id, $tweetId, $reportPushed)) {
    //             Tweet::whereId($tweetId)->decrement('report_count');
    //         }
    //     }

    // }

    // public function updateImpressionCount($impressionTweetIdList)
    // {
    //     $user = Auth::user();
    //     RedisModel::setActionToTweetPerUser(config('tweet.USER_ACTION.IMPRESSION'), $user->id, $impressionTweetIdList, true);
    //     RedisModel::incrTweetImpressionCount($impressionTweetIdList);
    // }
}
