<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostsController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('posts/index', ['posts' => $posts]);
    }

    public function create(){
        return view('posts/create');
    }

    public function store(Request $request){
        $post = new Post;
        $post->user_id = $request->user_id;
        $post->post = $request->post;
        $post->save();
        return redirect('/top');
    }

    public function show($id){
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }

    public function edit($id){
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, $id){
        $post = Post::find($id);
        $post->user_id = $request->user_id;
        $post->post = $request->post;
        $post->save();
        return redirect('posts/'.$id);
    }

    public function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return redirect('/top');
    }
}
