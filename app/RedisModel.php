<?php

namespace App;

use Illuminate\Support\Facades\Redis;

class RedisModel
{

    public static function setActionToClaimPerUser ($actionType, $userId, $claimId, $actionPushed)
    {
        $baseKey = implode(':', [config('claim.CLAIM_BASE_KEY'), $userId, $actionType]);
        $expireDays = 60;
        $isSet = false;
        if (is_array($claimId)) {
            $isSet = self::msetActionToClaimPerUser($baseKey, $claimId, $actionPushed);
        } else {
            $isSet = Redis::hset($baseKey, $claimId, $actionPushed);
        }
        Redis::expire($baseKey, 60 * 60 * 24 * $expireDays);
        return $isSet;
    }

    private static function msetActionToClaimPerUser ($baseKey, $claimIdList, $actionPushed)
    {
        $values = [];
        foreach($claimIdList as $claimId) {
            $values[$claimId] = $actionPushed;
        }
        return Redis::hMSet($baseKey, $values);
    }

    public static function getActionToClaimPerUser ($actionType, $userId, $claimIdList)
    {
        $baseKey = implode(':', [config('claim.CLAIM_BASE_KEY'), $userId, $actionType]);
        return Redis::hMGet($baseKey, $claimIdList);
    }


    public static function delActionToClaimPerUser ($actionType, $userId, $claimId)
    {
        $baseKey = implode(':', [config('claim.CLAIM_BASE_KEY'), $userId, $actionType]);
        $expireDays = 60;
        return Redis::hdel($baseKey, $claimId);
    }

    public static function incrClaimLikeCount($claimId)
    {
        $baseKey = implode(':', [config('claim.CLAIM_BASE_KEY'), config('claim.USER_ACTION.LIKE')]);
        $expireDays = 60;
        Redis::zincrby($baseKey, 1, $claimId);
        Redis::expire($baseKey, 60 * 60 * 24 * $expireDays);
    }

    public static function decrClaimLikeCount($claimId)
    {
        $baseKey = implode(':', [config('claim.CLAIM'), config('claim.USER_ACTION.LIKE')]);
        $expireDays = 60;
        Redis::zincrby($baseKey, -1, $claimId);
    }

    public static function incrClaimImpressionCount($impressionClaimIdList)
    {
        $baseKey = implode(':', [config('claim.CLAIM_BASE_KEY'), config('claim.USER_ACTION.IMPRESSION')]);
        $expireDays = 60;
        foreach($impressionClaimIdList as $claimId) {
            Redis::zincrby($baseKey, 1, $claimId);
        }
        Redis::expire($baseKey, 60 * 60 * 24 * $expireDays);
    }

    public static function zrangeClaimAction($actionType, $offset, $limit)
    {
        $baseKey = implode(':', [config('claim.CLAIM_BASE_KEY'), $actionType]);
        return Redis::command('ZRANGE', [$baseKey, $offset, $limit, 'WITHSCORES']);
    }

}
