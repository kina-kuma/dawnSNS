<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UsersController extends Controller
{

    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        return view('users.search');
    }

//フォロー
public function follow(User $user){
    $follower = auth()->user();
    //フォローしているか

}


//ログアウト
public function logout(){
    Auth::logout();
    return redirect('/login');
}

}
