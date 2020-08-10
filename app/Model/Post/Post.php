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
}
