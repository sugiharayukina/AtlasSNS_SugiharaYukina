<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    public function search(Request $request){
        $keyword = $request->input('keyword');
        if(!empty($keyword)){
            $users = User::where('username','like', '%'.$keyword.'%')->get();
        }else{
            $users = User::where('id', '!=', Auth::user()->id)->get();
        }
        return view('users.search', ['users'=>$users, 'keyword'=>$keyword]);
    }
}
