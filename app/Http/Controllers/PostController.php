<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct(){
        $this->authorizeResource(Post::class, 'post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['link'] = "https://www.youtube.com/embed/" . explode('=', $request['link'])[1];
        $material = Post::create($data);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $material = Post::where('id', $post->id)->first();
        $comments = Comment::where('post_id', $post->id)->get()->sortByDesc('created_at');
        $newComment = new Comment();
        $lastComment = count($comments->all());
        $i = 0;
        return view('material', compact('material', 'comments', 'lastComment', 'i'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['link'] = "https://www.youtube.com/embed/" . explode('=', $request['link'])[1];
        $post->update($data);
        return redirect(route('post.show', $post->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('dashboard'));
    }
}
