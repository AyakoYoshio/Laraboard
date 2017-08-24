<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThreadRequest;
use App\Thread;
use App\Comment;
use Carbon\Carbon;

class ThreadsController extends Controller
{
    public function index(){
        $threads = Thread::latest('last_commented')->get();
        return view('threads.index',compact('threads'));
    }
    public function create(){
        return view('threads.create');
    }
    public function store(ThreadRequest $request){
        $request->merge(array('last_commented' => Carbon::now()));
        $thread = \Auth::user()->threads()->create($request->all());
        \Flash::success('スレッドを新規作成しました。');
        return redirect()->route('threads.show',[$thread->id]);
    }
    public function show(Thread $thread){
        $comments = $thread->comments()->latest('created_at')->get();
        return view('threads.show',compact('thread','comments'));
    }
    public function edit(Thread $thread){
        return view('threads.edit', compact('thread'));
    }
    public function update(ThreadRequest $request, Thread $thread){
        $thread->update($request->all());
        \Flash::success('スレッドを編集しました。');
        return redirect()->route('threads.show',[$thread->id]);
    }
    public function destroy(Thread $thread){
        $thread->delete();
        \Flash::warning('スレッドとコメントを削除しました。');
        return redirect()->route('threads.index');
    }
}
