<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Branch;

class PageController extends Controller
{
    
    public function index()
    {
        // $posts = Post::with('images')->get();
        $branches = Branch::all();
        $posts = Post::orderBy('created_at','desc')->paginate(6);
        return view('home.index', compact('posts','branches'));
    }

    public function about()
    {
        $branches = Branch::all();
        // $posts = Post::with('images')->get();
        $posts = Post::orderBy('created_at','desc')->paginate(6);
        return view('home.about', compact('posts','branches'));
    }

    public function contact()
    {
        $branches = Branch::all();
        // $posts = Post::with('images')->get();
        $posts = Post::orderBy('created_at','desc')->paginate(6);
        return view('home.contact', compact('posts','branches'));
    }

    public function blog()
    {
        $branches = Branch::all();
        $posts = Post::orderBy('created_at','desc')->paginate(6);
        return view('home.blog', compact('posts','branches'));
    }

}
