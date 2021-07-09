@extends('layouts.login')

@section('content')

<div class='container'>
        {!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
        <?php $user = Auth::user(); ?>
        <img src="{{ asset('images/'.$user->images) }}">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか...?']) !!}
        </div>
       {!! Form::button('<img src ="images/post.png"></img>',['class'=>"btn", 'type'=>'submit'])!!}
        {!! Form::close() !!}

    </div>
   <h2>投稿一覧</h2>
            @foreach ($posts as $post)

                <p><img src="{{asset('images/'.$post->images) }}"></p>
                <p>{{ $post->username}}</p>
                <p>{{ $post->post }}</p>
                <p>{{ $post->created_at }}</p>
                <p><a class="btn btn-primary" href="/post/{{$post->id}}/update"><img src="images/edit.png"></a></p>
               <p><a class="btn btn-danger" href="/post/{{$post->id}}/delete" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')"><img src="images/trash.png"></a></p>

            @endforeach


@endsection
