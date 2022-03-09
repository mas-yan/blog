@extends('layout.master')
@section('title','Edit Slider')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6>Edit Slider</h6>
                <a href="{{ route('sliders.index') }}" class="btn btn-secondary">Back</a>
                <form action="{{ route('sliders.update', $slider->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for='image'>Image</label>
                        <input type='file' name='image' placeholder="Insert Image" id='image' class='form-control @error('image') is-invalid @enderror'>
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for='link'>Link</label>
                        <input type='text' name='link' placeholder="Insert Link" value="{{ old('link', $slider->link) }}" id='link' class='form-control @error('link') is-invalid @enderror'>
                        @error('link')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-success">Edit Slider</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection