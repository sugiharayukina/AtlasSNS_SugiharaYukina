<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // 「１対多」の「多」側 → メソッド名は複数形
    public function posts() {
        return $this->hasMany('App\Post');
    }

    // 自分のフォロワー
    public function follower() {
        return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id');
    }

    // 自分がフォロー
    public function follows() {
        return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id');
    }

    public function isFollowing(Int $user_id) {
        return (bool) $this->follows()->where('followed_id', $user_id)->first();
    }
}
