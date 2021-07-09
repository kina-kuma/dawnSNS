@extends('layouts.login')

@section('content')

<div class="container">
   @foreach ($list as $list)

                <p><img src="{{asset('images/'.$list->images) }}"
                class="rounded-circle" width="50" height="50"></p>
                <p>{{ $list->username}}</p>


                            <div class="">
                                @if (auth()->user()->isFollowing($user->id))
                                    <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">フォロー解除</button>
                                    </form>
                                @else
                                    <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                                        {{ csrf_field() }}

                                        <button type="submit" class="btn btn-primary">フォローする</button>
                                    </form>
                                @endif
                                </div>

            @endforeach



</div>


@endsection
