<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index(){
        return view('/posts.index');
    }


    //登録用メソッドの実装
     public function create(Request $request)
    {
        $post = $request->input('newPost');
        \DB::table('posts')->insert([
            'post' => $post
        ]);

        return redirect('/top');
    }


}
