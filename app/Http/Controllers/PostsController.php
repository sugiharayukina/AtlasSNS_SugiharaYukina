<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\User;
use App\Follow;

class PostsController extends Controller
{
    public function index() {
        $follows = Auth::user()->follows()->pluck('followed_id');
        $user = Auth::user();
        $posts = Post::orderBy('created_at', 'desc')->with('user')->whereIn('user_id', $follows)->orWhere('user_id', $user->id)->get();
        // 'posts'フォルダ内の'index'viewファイルを返す。
        // その際にview内で使用する変数を代入する。
        return view('posts.index', compact('posts'));
    }

    // データを作成し、データベースに保存する
    public function create(Request $request){
        $validator = $request->validate([
            'post' => ['required', 'string', 'max:150'],
        ]);
        Post::create([
        // フォームから送られてきたデータをそれぞれ代入
        'user_id' => Auth::user()->id,
        'post' => $request->post,
        ]);
        // indexページへ遷移
        return redirect('/top');
    }

    public function update(Request $request){
        $id = $request->input('id');
        Post::where('id', $id)->update(['post'=> $request->updatePost]);
        return redirect('/top');
    }

    public function delete($id){
        Post::where('id', $id)->delete();
        return redirect('/top');
    }
}
