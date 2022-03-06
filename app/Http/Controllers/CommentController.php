<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(CommentRequest $request , Post $post)
    {
        $validatedRequest = $request->validated();
        $validatedRequest['post_id'] = $post->id;
        $validatedRequest['user_id'] = auth()->user()->id;
        Comment::create($validatedRequest);
        
        return response()->json(['result' => 'successful comment creation']);
    }

    public function destroy(Comment $comment)
    {   
        $comment->delete();
        return response()->json(['result' => 'successful comment deletion']);
    }
}
