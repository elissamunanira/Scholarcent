<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentsController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'comment_body' => 'required'
        ]);
    
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email= $request->email;
        $comment->comment_body = $request->comment_body;
        $comment->post_id = $post->id;
        $comment->save();
    
        return back()->with('success', 'Your Comment sent successfully!');
    }
}