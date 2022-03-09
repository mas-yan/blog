@extends('layout.master')
@section('title','Add Slider')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6>Add Slider</h6>
                <a href="{{ route('sliders.index') }}" class="btn btn-secondary">Back</a>
                <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
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
                        <input type='text' name='link' placeholder="Insert Link" value="{{ old('link') }}" id='link' class='form-control @error('link') is-invalid @enderror'>
                        @error('link')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-success">Add Slider</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection