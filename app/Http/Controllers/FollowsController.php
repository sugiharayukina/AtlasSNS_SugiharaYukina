<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use App\Follow;

class FollowsController extends Controller
{
    public function follow(User $user) {
        $follow = Follow::create([
            'following_id' => Auth::user()->id,
            'followed_id' => $user->id,
        ]);
        $followCount = count(Follow::where('followed_id', $user->id)->get());
        return redirect('/search');
    }

    // フォロー解除
    public function unfollow(User $user) {
        $follow = Follow::where('following_id', Auth::user()->id)->where('followed_id', $user->id)->first();
        $follow->delete();
        $followCount = count(Follow::where('followed_id', $user->id)->get());

        return redirect('/search');
    }

    // フォローリスト
    public function followList() {
        // フォローしているユーザーのidを取得
        $follows = Auth::user()->follows()->get();
        $following_id = Auth::user()->follows()->pluck('followed_id');
        // dd($following_id);
        $posts = Post::with('user')->whereIn('user_id', $following_id)->latest()->get();
        return view('follows.followList', ['posts' => $posts, 'follows' => $follows]);
    }

    public function followerList() {
        $follower_list = Auth::user()->followers()->get();
        $followed_id = Auth::user()->followers()->pluck('following_id');
        $posts = Post::with('user')->whereIn('user_id', $followed_id)->latest()->get();
        // return $follower_list;
        return view('follows.followerList', ['posts' => $posts, 'follows' => $follows]);
    }
}
