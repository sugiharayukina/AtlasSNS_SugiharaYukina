<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostsController extends Controller
{
    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->get();
        // 'posts'フォルダ内の'index'viewファイルを返す。
        // その際にview内で使用する変数を代入する。
        return view('posts.index', ['posts' => $posts]);
    }

    // 新規投稿作成画面を表示する
    // public function create(Request $request){
    //     return view('posts.index');
    // }

    // データを作成し、データベースに保存する
    public function store(Request $request){
        // 新しいPostを作成
        $post = new Post;
        // フォームから送られてきたデータをそれぞれ代入
        $post->user_id = $request->user_id;
        $post->user = $request->username;
        $post->post = $request->post;
        // データベースに保存
        $post->save();
        // indexページへ遷移
        return redirect('/posts');
    }

    // 詳細画面のように、データを一つずつ表示するページ
    public function show($id){
        $post = Post::find($id);
        return view('posts.index', ['post' => $post]);
    }

    public function edit($id){
        $post = Post::find($id);
        return view('posts.index', ['post' => $post]);
    }

    public function update(Request $request, $id){
        $post = Post::find($id);
        $post->user_id = $request->user_id;
        $post->user = $request->username;
        $post->post = $request->post;
        $post->save();
        return redirect('posts/'.$id);
    }

    public function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts');
    }
}
