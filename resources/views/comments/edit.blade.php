@extends('layout')

@section('content')
    {!! link_to_route('threads.show','<< コメント編集をキャンセル',[$comment->thread_id],[]) !!}
    <h1>コメントを編集</h1>
    <hr/>
    @include('errors.form_errors')
    {!! Form::model($comment, ['method'=>'PATCH', 'url'=>['comments', $comment->id]]) !!}
        @include('threads.form',['submitButton' => '編集する'])
    {!! Form::close() !!}
@endsection
