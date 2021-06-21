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
            @foreach ($list as $list)

                <p><?php $user = Auth::user(); ?><img src="{{ asset('images/'.$user->images) }}"></p>
                <p>{{ $user->username}}</p>
                <p>{{ $list->post }}</p>
                <p>{{ $list->created_at }}</p>
                 <p><a class="btn btn-primary" href="/post/{{$list->id}}/update"><img src="images/edit.png"></a></p>
               <p><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')"><img src="images/trash.png"></a></p>
            @endforeach


@endsection
