<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;

class CommentController extends Controller
{
    public function store(CommentRequest $request , Post $post)
    {
        $validatedRequest = $request->validated();
        $validatedRequest['post_id'] = $post->id;
        $validatedRequest['user_id'] = auth()->user()->id;
        $validatedRequest['commented_at'] = Carbon::now();

        Comment::create($validatedRequest);
        
        return response()->json(['result' => 'successful comment creation']);
    }

    public function destroy(Comment $comment)
    {   
        $comment->delete();
        return response()->json(['result' => 'successful comment deletion']);
    }

    public function getCommentsPerPost(Post $post)
    {   
        return $post->comments;
    }
}
