@extends('layout')

@section('content')
    <h1>{{ $thread->title }}</h1>
    <article>
        <div class="lead">{{ $thread->body }}</div>
        <p style="text-align:right">
            by: <strong>{{ $thread->user->name }}</strong><br>
            作成: {{ $thread->created_at }} 更新: {{ $thread->updated_at }}<br>
            @if((Auth::check()) and ($thread->user->id === Auth::user()->id))
                {{ link_to_action('ThreadsController@edit', '編集', [$thread->id], ['class' => 'btn btn-primary']) }}
                {{ link_to('#','削除', ['class' => 'btn btn-danger','onclick'=>"deleteCheck(this,'delete_t_".$thread->id."');"]) }}
                {!! Form::open(['id'=>'delete_t_'.$thread->id, 'method' => 'DELETE', 'url' => ['threads', $thread->id]]) !!}
                {!! Form::close() !!}
            @endif
        </p>
    </article>
    <hr>
    @if(Auth::check())
        {!! link_to_route('comments.create', 'このスレッドにコメントする', [$thread->id], ['class' => 'btn btn-primary']) !!}
    @else
        {!! link_to_route('login', 'ログイン') !!}または{!! link_to_route('register', 'ユーザー登録') !!}してコメントする
    @endif
    @foreach($comments as $comment)
        <h3>{{ $comment->title }}</h3>
        <div>{{ $comment->body }}</div>
        <p style="text-align:right">
            by: <strong>{{ $comment->user->name }}</strong><br>
            作成: {{ $comment->created_at }} 更新: {{ $comment->updated_at }}<br>
            @if((Auth::check()) and ($comment->user->id === Auth::user()->id))
                {{ link_to_action('CommentsController@edit', '編集', [$comment->id], ['class' => 'btn btn-primary']) }}
                {{ link_to('#','削除', ['class' => 'btn btn-danger','onclick'=>"deleteCheck(this,'delete_c_".$comment->id."');"]) }}
                {!! Form::open(['id'=>'delete_c_'.$comment->id, 'method' => 'DELETE', 'url' => ['comments', $comment->id]]) !!}
                {!! Form::close() !!}
            @endif
        </p>
        <hr>
    @endforeach
    <script>
    function deleteCheck(e,id) {
      'use strict';
      if (confirm('この操作は取り消せません。本当に削除しますか？')) {
          document.getElementById(id).submit();
      }
    }
    </script>
@endsection
