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

          @foreach ($list as $list)
            <tr>
                <td>{{ $list->id }}</td>
                <td>{{ $list->post }}</td>
                <td>{{ $list->created_at }}</td>
                  </tr>
 @endforeach
    </div>



@endsection
