<?php

namespace App\Model\Post\system;

use Illuminate\Database\Eloquent\Model;

class Claim_Output extends Model
{
    protected $table = 'claim_output';
    protected $fillable = ['id','user_id', 'claim_id', 'content', ];

    public function user()
    {
        // リレーション
        return $this->belongsTo('App\Model\User\User');
    }

    // チャットリレーション
    // Postはチャットモデルの親？に当たるので、関係ない
    public function claim()
    {
        return $this->belongsTo('App\Model\Post\System\Claim');
    }

}