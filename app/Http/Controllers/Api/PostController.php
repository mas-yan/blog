<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::when(request()->q, function ($posts) {
            $posts = $posts->where('title', 'like', '%' . request()->q . '%');
        })->latest()->with(['tags', 'category'])->paginate(10);
        return response()->json([
            'success' => true,
            'message' => 'Data Article',
            'data' => $posts
        ]);
    }

    public function postHome()
    {
        $posts = Post::latest()->with(['tags', 'category'])->take(3)->get();
        return response()->json([
            'success' => true,
            'message' => 'Data Article',
            'data' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return response()->json([
            'success' => true,
            'message' => 'Data Article',
            'data' => $post
        ]);
    }
}
