@extends('layouts.login')

@section('content')

<div class='container'>
        {!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
        <img src="images/dawn.png">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか...?']) !!}
        </div>
       {!! Form::button('<img src ="images/post.png"></img>',['class'=>"btn", 'type'=>'submit'])!!}
        {!! Form::close() !!}

    </div>
   <h2>投稿一覧</h2>
            @foreach ($list as $list)

                <p>{{ $list->user_id }}</p>
                <p>{{ $list->post }}</p>
                <p>{{ $list->created_at }}</p>
                 <p><a class="btn btn-primary" href="/post/{{$list->id}}/update-form"><img src="images/edit.png"></a></p>
               <p><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash.png"></a></p>
            @endforeach


@endsection
