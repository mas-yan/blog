@extends('layout.master')
@section('title','Add Category')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6>Add Category</h6>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for='categories'>Category</label>
                        <input type='text' name='category' placeholder="Insert Category" value="{{ old('category') }}" id='category' class='form-control @error('category') is-invalid @enderror'>
                        @error('category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-success">Add Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection