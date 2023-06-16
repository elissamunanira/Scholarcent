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
        $posts1 = Post::orderBy('created_at','desc')->paginate(6);
        $scholarshipPosts = Post::orderBy('created_at','desc')->where('branch_name', 'scholarship')->paginate(4);
        $internshipPosts = Post::orderBy('created_at','desc')->where('branch_name', 'internship')->paginate(4);
        $coursesPosts = Post::orderBy('created_at','desc')->where('branch_name', 'courses')->paginate(3);
        $jobPosts = Post::orderBy('created_at','desc')->where('branch_name', 'jobs')->paginate(4);
        $continentPosts = Post::orderBy('created_at','desc')->where('branch_name', 'continent')->paginate(4);
        $recentPosts = Post::orderBy('created_at','desc')->paginate(4);
        return view('home.index', compact('posts','posts1','scholarshipPosts','internshipPosts','coursesPosts','jobPosts','continentPosts','recentPosts','branches'));
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

    //start of filtering projects functions 

    public function scholarship(){
        $posts = Post::orderBy('created_at','desc')->where('branch_name', 'scholarship')->paginate(9);
        $recentPosts = Post::orderBy('created_at','desc')->paginate(4);
        return view("home.blogs",compact('posts','recentPosts'));
    }

    public function internship(){
        $posts = Post::orderBy('created_at','desc')->where('branch_name', 'internship')->paginate(9);
        $recentPosts = Post::orderBy('created_at','desc')->paginate(4);
        return view("home.blogs",compact('posts','recentPosts'));
    }

    public function jobs(){
        $posts = Post::orderBy('created_at','desc')->where('branch_name', 'jobs')->paginate(9);
        $recentPosts = Post::orderBy('created_at','desc')->paginate(4);
        return view("home.blogs",compact('posts','recentPosts'));
    }

    public function courses(){
        $posts = Post::orderBy('created_at','desc')->where('branch_name', 'courses')->paginate(9);
        $recentPosts = Post::orderBy('created_at','desc')->paginate(4);
        return view("home.blogs",compact('posts','recentPosts'));
    }

    public function continent(){
        $posts = Post::orderBy('created_at','desc')->where('branch_name', 'continent')->paginate(9);
        $recentPosts = Post::orderBy('created_at','desc')->paginate(4);
        return view("home.blogs",compact('posts','recentPosts'));
    }

}
