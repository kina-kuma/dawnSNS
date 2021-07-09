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


   // public function search(User $user){
     //    $all_users = $user->getAllUsers(auth()->user()->id);

       // return view('users.search',compact('all_users'));
    //}



   public function search(){
     $list = \DB::table('users')->get();
   return view('users.search',[ 'list'=>$list ]);
  }



  // フォロー
    public function follow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }

    // フォロー解除
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($user->id);
            return back();
        }
    }

//ログアウト
public function logout(){
    Auth::logout();
    return redirect('/login');
}

}
