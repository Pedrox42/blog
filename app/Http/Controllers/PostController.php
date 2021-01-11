<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{

    public function __construct(){
        $this->authorizeResource(Post::class, 'post');
    }

    public function index()
    {
        // $posts = Post::all()->sortByDesc('created_at');
        //Paginação para a pagina nao ficar muito pesada quando existirem muitos posts
        $posts = Post::orderBy('created_at', 'desc')->paginate(20);
        $lastPost = count($posts->all());
        $i = 0;
        return view('dashboard', compact('posts', 'lastPost', 'i'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['link'] = Post::adjustLink($request['link']);
        $material = Post::create($data);
        return redirect()->route('post.index')->with('toast_success', 'Ação realizada com sucesso!');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        if($request['link'] != $post->link){
            $data['link'] = Post::adjustLink($request['link']);
        }
        $post->update($data);
        return redirect(route('post.show', $post->id))->with('toast_success', 'Ação realizada com sucesso!');
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
        return redirect(route('post.index'))->with('toast_success', 'Ação realizada com sucesso!');
    }
}
