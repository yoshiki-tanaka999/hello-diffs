<?php

namespace App\Model\Post\evaluation;

use Illuminate\Database\Eloquent\Model;

class Claim_like extends Model
{
    protected $fillable = [
        'id', 'claim_id', 'user_id'
    ];

    public function claim()
    {
        return $this->belongsTo('App\Model\Post\System\Claim', 'claim_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User\User', 'user_id', 'id');
    }
}
