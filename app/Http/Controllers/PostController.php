<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:post_show', ['only' => 'index']);
        $this->middleware('permission:post_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:post_update', ['only' => ['update', 'edit']]);
        $this->middleware('permission:post_delete', ['only' => 'destroy']);
        $this->middleware('permission:post_detail', ['only' => 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->with(['tags', 'category'])->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $tags = Tag::get();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => ['required'],
            'article' => ['required'],
            'description' => ['required'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'title' => ['required', 'unique:posts,title'],
        ]);

        $image = $request->file('image');
        $image->storeAs('public/Post', $image->hashName());

        $post = Post::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category,
            'article' => $request->article,
            'description' => $request->description,
            'image' => $image->hashName(),
            'title' => $request->title,
            'slug' => str()->slug($request->title)
        ]);

        $post->tags()->attach($request->tags);
        return redirect()->route('posts.index')->with('success', 'Success Added Posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::get();
        $tags = Tag::get();
        return view('admin.posts.edit', compact('categories', 'tags', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'category' => ['required'],
            'article' => ['required'],
            'description' => ['required'],
            'image' => ['image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'title' => [
                'required',
                Rule::unique('posts')->ignore($post->id)
            ],
        ]);

        $image = $request->file('image');
        if ($image) {
            Storage::disk('local')->delete('public/Post/' . $post->image);
            $image->storeAs('public/Post', $image->hashName());

            $post->update([
                'user_id' => auth()->user()->id,
                'category_id' => $request->category,
                'article' => $request->article,
                'description' => $request->description,
                'image' => $image->hashName(),
                'title' => $request->title,
                'slug' => str()->slug($request->title)
            ]);
        } else {
            $post->update([
                'user_id' => auth()->user()->id,
                'category_id' => $request->category,
                'article' => $request->article,
                'title' => $request->title,
                'slug' => str()->slug($request->title)
            ]);
        }

        $post->tags()->sync($request->tags);
        return redirect()->route('posts.index')->with('success', 'Success Updated Posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::disk('local')->delete('public/Post/' . $post->image);
        $post->delete();
    }
}
