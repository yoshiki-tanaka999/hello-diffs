<?php

namespace App\Model\User;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// 追加
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 追加
        /**
     * JWT の subject claim となる識別子を取得する
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * キーバリュー値を返します, JWTに追加される custom claims を含む
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    // 投稿管理者リレーション(Participantナシver)
    public function posts()
    {
        return $this->hasMany('App\Model\Post');
    }

    public function chats()
    {
        return $this->hasMany('App\Model\Post\System\Chat');
    }

    // Postモデルの下の階層？
    public function claims()
    {
        return $this->hasMany('App\Model\Post\System\Claim');
    }

    public function claim_likes()
    {
        return $this->hasMany('App\Model\Post\System\Claim_like', 'user_id', 'id');
    }

    // public function newposts()
    // {
    //     return $this->hasMany('App\Model\NewPost');
    // }

    // public function newclaims()
    // {
    //     return $this->hasMany('App\Model\Post\System\NewClaim');
    // }
    
}
