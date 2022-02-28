<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Keyword;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return $posts;
    }

    public function show(Post $post)
    {   
        return $post;
    }

    public function store(PostRequest $request)
    {
        $validatedRequest = $request->validated();
        $validatedRequest['user_id'] = 1; // TODO: authenticated user
        Post::create($validatedRequest);
        return response()->json(['result' => 'successful creation']);
    }

    public function update(PostRequest $request , Post $post)
    {   
        $validatedRequest = $request->validated();
        $post->update($validatedRequest);
        return response()->json(['result' => 'successful update']); 
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(["result" => "successful deletion"]);
    }

    public function getSiteStatistics()
    {   
        $statistics = DB::table('posts')
            ->select(DB::raw("DATE_FORMAT(created_at,'%Y-%d-%m') as posted_at, count(*) as total_posts"))
            ->groupBy('posted_at')
            ->get();
        return $statistics;
    }

    public function getKeywordStatistics()
    {
        $statistics = Keyword::select(
                            'keyword',
                             DB::raw('count(*) as keyword_appearances')
                             )
                             ->orderBy('keyword_appearances' , 'desc')
                             ->groupBy('keyword')
                             ->limit(3)
                             ->get();
        return $statistics;
    }
}