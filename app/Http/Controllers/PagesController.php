<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    public function home()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(2);
        return view('pages.home')->withPosts($posts);
    }
}
