<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

   // public function index() {

  // return view('posts.index');
   //}



    //登録用メソッドの実装
     public function create(Request $request)
    {

        $post = $request->input('newPost');
        \DB::table('posts')->insert([
            'post' => $post,
            'user_id' => Auth::user()->id,
        ]);
        return redirect('/top');
   }


 //  public function index(Post $post)
  //{
   //  $list = \DB::table('posts')->get();
   //return view('posts/index',[
    //   'post'=>$post->post,
     //  'user_id' => $post->user_id,
  // ]);
  //}

   //ツイート内容を表示
    public function index()
   {
    $posts = \DB::table('posts')
    ->join('users','posts.user_id','users.id')
    ->get();

    return view('posts.index',compact('posts'));
   }


    //delete削除機能の実装
     public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }

//アップデート機能の実装
     public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        \DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $up_post]
            );
}

}
