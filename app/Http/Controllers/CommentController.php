<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    //

    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'comment' => 'required|string'
        ]);

        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->user_id = auth()->id();
        $comment->comment = $request->comment;
        $comment->publish_at = now();
        $comment->save();

        return redirect()->route('posts.get', ['post' => $request->post_id]);
    }
}
