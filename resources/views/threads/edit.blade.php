@extends('layout')

@section('content')
    {!! link_to_route('threads.show','<< スレッド編集をキャンセル',[$thread->id],[]) !!}
    <h1>スレッドを編集</h1>
    <hr/>
    @include('errors.form_errors')
    {!! Form::model($thread, ['method'=>'PATCH', 'url'=>['threads', $thread->id]]) !!}
        @include('threads.form',['submitButton' => '編集する'])
    {!! Form::close() !!}
@endsection
