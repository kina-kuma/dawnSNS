<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            
        ]);




        return redirect('/top');
    }

   //ツイート内容を表示
    public function index()
   {
    $list = \DB::table('posts')->get();
    return view('posts.index', ['list'=>$list]);
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
