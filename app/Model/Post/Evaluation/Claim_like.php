<?php

namespace App\Model\Post\evaluation;

use Illuminate\Database\Eloquent\Model;

class Claim_like extends Model
{
    public function user()
    {
        // リレーション
        return $this->belongsTo('App\Model\User\User');
    }
}
