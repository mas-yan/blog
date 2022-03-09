<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::paginate(5);
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
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
            'image' => 'required|image|mimes:png,jpeg,jpg|max:2048',
            'link' => 'required|unique:sliders,link'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/Slider', $image->hashName());

        Slider::create([
            'image' => $image->hashName(),
            'link' => $request->link,
            'slug' => str()->slug($request->link),
        ]);

        return redirect()->route('sliders.index')->with('success', 'Slider Success Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'image' => 'image|mimes:png,jpeg,jpg|max:2048',
            'link' => [
                'required',
                Rule::unique('sliders')->ignore($slider->id),
            ]
        ]);

        $image = $request->file('image');
        if ($image) {
            Storage::disk('local')->delete('public/Slider/' . $slider->image);
            $image->storeAs('public/Slider', $image->hashName());

            $slider->update([
                'image' => $image->hashName(),
                'link' => $request->link,
                'slug' => str()->slug($request->link),
            ]);
        } else {
            $slider->update([
                'link' => $request->link,
                'slug' => str()->slug($request->link),
            ]);
        }

        return redirect()->route('sliders.index')->with('success', 'Slider Success Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        Storage::disk('local')->delete('public/Slider/' . $slider->image);
        return redirect()->route('sliders.index')->with('success', 'Slider Success Deleted');
    }
}
