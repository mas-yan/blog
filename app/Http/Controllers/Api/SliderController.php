<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $slider = Slider::latest()->get();

        return response()->json([
            'success' => true,
            'message' => "List Data Slider",
            'data' => $slider
        ]);
    }
}
