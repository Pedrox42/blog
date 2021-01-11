<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{

    public function __construct(){
        $this->authorizeResource(Comment::class, 'comment');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $newComment = Comment::create($data);
        return redirect(route('post.show', $data['post_id']))->with('toast_success', 'Ação realizada com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $data = $request->all();
        if($data['comment'] == null){
            $data['comment'] = old('comment', $comment->comment);
        }
        $comment->update($data);
        return redirect(route('post.show', $comment->post->id))->with('toast_success', 'Ação realizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $postId = $comment->post->id;
        $comment->delete();
        return redirect(route('post.show', $postId))->with('toast_success', 'Ação realizada com sucesso!');
    }
}
