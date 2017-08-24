@extends('layout')

@section('content')
    {!! link_to_route('threads.show','<< コメント作成をキャンセル',[$thread_id],[]) !!}
    <h1>新しいコメントを作成</h1>
    <hr/>
    @include('errors.form_errors')
    {!! Form::open(['route'=>'comments.store']) !!}
        @include('comments.form',['thread_id' => $thread_id,'submitButton' => 'コメントする'])
    {!! Form::close() !!}
@endsection
