<?php

namespace App\Model\Post;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    public static $rules = [
        'title' => 'required|max: 255',
        'description' => 'required|max: 255',
        'img_url' => 'image|file',
    ];

    public function user()
    {
        // リレーション
        return $this->belongsTo('App\Model\User\User');
    }

    // チャットリレーション
    public function chats()
    {
        return $this->hasMany('App\Model\Post\System\Chat');
    }

    public function claims()
    {
        return $this->hasMany('App\Model\Post\System\Claim');
    }
}

