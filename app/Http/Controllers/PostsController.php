<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;

class PostsController extends Controller
{
    public function index(){
        $posts = Post::latest()->get();
        // orderBy('created_at', 'desc')->get();
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

    public function update(Request $request, Post $post){
        $id = $request->input('id');
        $update_post = $request->input('updatePost');
        Post::where('id', $request->id)->update(['post'=> $request->update_post]);
        return redirect()->route('posts.update');
    }

    public function destroy($id){
        Post::where('id', $id)->delete();
        return redirect('/top');
    }
}
