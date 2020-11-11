<?php

namespace App\Model\Post\system;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $fillable = ['post_id', 'content', 'participant_id'];

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

    // Like機能
    // protected $appends = ['is_liked'];

    // public function getIsLikedAttribute() {
    //     return $this->attributes['is_liked'];
    // }
}
