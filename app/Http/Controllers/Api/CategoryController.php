<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::paginate(12);
        return response()->json([
            'success' => true,
            'message' => 'Data Category',
            'data' => $category
        ]);
    }

    public function show(Category $category)
    {
        $posts = $category->posts()->latest()->with(['tags', 'category'])->paginate(5);
        return response()->json([
            'success' => true,
            'message' => 'Data Category',
            'category' => $category,
            'article' => $posts,
        ]);
    }

    public function categoryHome()
    {
        $category = Category::latest()->limit(5)->get();

        return response()->json([
            'success' => true,
            'message' => 'Data Category',
            'data' => $category
        ]);
    }
}
