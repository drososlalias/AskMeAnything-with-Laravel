<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getUserStatistics(Request $request)
    {   
        $userId = auth()->user()->id;
        $total_posts = Post::where('id' , $userId)->get();
        $total_posts_today = $total_posts->where('published_at', '>=', Carbon::today());
        $total_comments = Comment::where('user_id' , $userId)->get();
        $total_comments_today = $total_comments->where('commented_at', '>=', Carbon::today());
        return response()->json([
            'total_posts' => count($total_posts),
            'total_posts_today' => count($total_posts_today),
            'total_comments' => count($total_comments),
            'total_comments_today' => count($total_comments_today),
        ]);
    }
}
