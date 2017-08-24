<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Comment;
use App\Thread;
use Carbon\Carbon;

class CommentsController extends Controller
{
    public function index(){}
    public function create($id){
        return view('comments.create', ['thread_id' => $id]);
    }
    public function store(CommentRequest $request){
        $comment = \Auth::user()->comments()->create($request->all());
        $thread = Thread::where('id', $comment->thread_id);
        $thread->update(['last_commented' => Carbon::now()]);
        \Flash::success('コメントしました。');
        return redirect()->route('threads.show',[$comment->thread_id]);
    }
    public function show($id){}
    public function edit(Comment $comment){
        return view('comments.edit', compact('comment'));
    }
    public function update(CommentRequest $request, Comment $comment){
        $comment->update($request->all());
        \Flash::success('コメントを編集しました。');
        return redirect()->route('threads.show',[$comment->thread_id]);
    }
    public function destroy(Comment $comment){
        $comment->delete();
        \Flash::warning('コメントを削除しました。');
        return redirect()->route('threads.show',[$comment->thread_id]);
    }
}
