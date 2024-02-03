<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = ['following_id', 'followed_id'];

    protected $table = 'follows';

    public function followCount(){
        return $this->hasMany('App\Follow');
    }

    public function follows() {
        // フォローしているユーザーを取得
        return $this->belongToMany(self::class, 'follows', 'following_id', 'followed_id');
    }

    public function followers() {
        // フォロワーのユーザーを取得
        return $this->belongToMany(self::class, 'follows', 'following_id', 'followed_id');
    }
}
