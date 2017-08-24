@extends('layout')

@section('content')
    {!! link_to_route('threads.index','<< スレッド新規作成をキャンセル') !!}
    <h1>新しいスレッドを作成</h1>
    <hr/>
    @include('errors.form_errors')
    {!! Form::open(['route'=>'threads.store']) !!}
        @include('threads.form',['submitButton' => '作成する'])
    {!! Form::close() !!}
@endsection
