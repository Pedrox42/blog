<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        $lastPost = count($posts->all());
        $i = 0;
        return view('dashboard', compact('posts', 'lastPost', 'i'));
    }

    public function material($id)
    {
        
    }

}
