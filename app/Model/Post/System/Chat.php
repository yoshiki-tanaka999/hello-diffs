<?php

namespace App\Model\Post\System;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $guarded = ['id','content','post_id'];
}
