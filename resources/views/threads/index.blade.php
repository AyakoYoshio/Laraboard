@extends('layout')

@section('content')
    <h1>スレッド一覧</h1>
    @if(Auth::check())
        {!! link_to_route('threads.create', 'スレッドを新規作成', [], ['class' => 'btn btn-primary']) !!}
    @else
        {!! link_to_route('login', 'ログイン') !!}または{!! link_to_route('register', 'ユーザー登録') !!}してスレッドを作成
    @endif
    @foreach($threads as $thread)
        <div>
            <H2>
                <a href="{{url('threads',$thread->id)}}">{{ $thread->title }}</a>
            </H2>
            <p>
                <div class="body">{{ $thread->body }}</div>
            </p>
        </div>
    @endforeach
@endsection
