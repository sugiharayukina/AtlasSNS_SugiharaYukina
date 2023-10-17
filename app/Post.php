<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'post',
    ];

    // ユーザーが投稿した記事を取得
    // １対多 の１側なので単数形
    public function user() {
        return $this->belongsTo('App\User');
    }
}
