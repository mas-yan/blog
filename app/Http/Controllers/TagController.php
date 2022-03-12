<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:tag_show', ['only' => 'index']);
        $this->middleware('permission:tag_detail', ['only' => 'show']);
        $this->middleware('permission:tag_create', ['only' => 'create', 'store']);
        $this->middleware('permission:tag_update', ['only' => 'update', 'edit']);
        $this->middleware('permission:tag_delete', ['only' => 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(5);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
            'tags' => 'required|unique:tags,tags'
        ]);

        $value = ['bg-dark', 'bg-danger', 'bg-secondary', 'bg-warning', 'bg-primary', 'bg-info', 'bg-success'];
        $bg = array_rand($value, 5);

        Tag::create([
            'tags' => $request->tags,
            'slug' => str()->slug($request->tags),
            'bg' => $value[rand(0, count($bg) - 1)]
        ]);
        return redirect()->route('tags.index')->with('success', 'Success Added Tags');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->with(['tags', 'category'])->paginate(10);
        return view('admin.tags.show', compact('tag', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'tags' => [
                'required',
                Rule::unique('tags')->ignore($tag->id),
            ]
        ]);

        $tag->update([
            'tags' => $request->tags,
            'slug' => str()->slug($request->tags),
        ]);
        return redirect()->route('tags.index')->with('success', 'Success Update Tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Success Delete Tags');
    }
}
