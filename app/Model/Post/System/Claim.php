<?php

namespace App\Model\Post\system;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $fillable = ['post_id', 'content', 'user_id'];

    public function user()
    {
        // リレーション
        return $this->belongsTo('App\Model\User\User');
    }

    public function post()
    {
        // リレーション
        return $this->belongsTo('App\Model\Post\System\Claim');
    }    

    public function claim_output()
    {
        // リレーション
        return $this->hasMany('App\Model\Post\System\Claim_Output');
    }   

    public function claim_likes()
    {
        return $this->hasMany('App\Model\Post\Evaluation\Claim_like', 'claim_id', 'id');
    }

    public static function defaultLiked($claim, $user_auth_id)
    {
      // $defaultLiked = $post->likes->where('user_id', $user_auth_id)->first();

        $defaultLiked = 0;
        foreach ($claim['likes'] as $key => $claim_like) {
            if($claim_like['user_id'] == $user_auth_id) {
                $defaultLiked = 1;
                break;
            }
        }

        if(count($defaultLiked) == 0) {
                $defaultLiked == false;
            } else {
                $defaultLiked == true;
            }

        return $defaultLiked;
    }

    // Like機能
    // protected $appends = ['is_liked'];

    // public function getIsLikedAttribute() {
    //     return $this->attributes['is_liked'];
    // }
}
