<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:category_show', ['only' => 'index']);
        $this->middleware('permission:category_detail', ['only' => 'show']);
        $this->middleware('permission:category_create', ['only' => 'create', 'store']);
        $this->middleware('permission:category_update', ['only' => 'update', 'edit']);
        $this->middleware('permission:category_delete', ['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'category' => ['required', 'unique:categories,category']
        ]);

        $image = $request->file('image');
        $image->storeAs('public/Category', $image->hashName());

        Category::create([
            'image' => $image->hashName(),
            'category' => $request->category,
            'slug' => str()->slug($request->category),
        ]);

        return redirect()->route('categories.index')->with('success', 'Success Added Category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $posts = $category->posts()->latest()->with(['tags', 'category'])->paginate(5);
        return view('admin.categories.show', compact('category', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // dd($category->slug);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'image' => ['image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'category' => [
                'required',
                Rule::unique('categories')->ignore($category->id),
            ]
        ]);

        $image = $request->file('image');
        if ($image) {
            Storage::disk('local')->delete('public/Category/' . $category->image);
            $image->storeAs('public/Category', $image->hashName());
            $category->update([
                'image' => $image->hashName(),
                'category' => $request->category,
                'slug' => str()->slug($request->category),
            ]);
        } else {
            $category->update([
                'category' => $request->category,
                'slug' => str()->slug($request->category),
            ]);
        }

        return redirect()->route('categories.index')->with('success', 'Success Updated Category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Storage::disk('local')->delete('public/Category/' . $category->image);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Success Deleted Category');
    }
}
