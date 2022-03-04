@extends('layout.master')
@section('title','Edit Post')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6>Edit Post</h6>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
                <form action="{{ route('posts.update',$post->slug) }}" method="POST" enctype="multipart/form-data">
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
                        <label for='title'>Title</label>
                        <input type='text' name='title' placeholder="Insert Article" value="{{ old('title',$post->title) }}" id='title' class='form-control @error('title') is-invalid @enderror'>
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for='article'>Article</label>
                        <input type='text' name='article' placeholder="Insert Article" value="{{ old('article',$post->article) }}" id='article' class='form-control @error('article') is-invalid @enderror'>
                        @error('article')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for='category'>Category</label>
                        <select class="select form-control @error('category') is-invalid @enderror" name="category">
                            <option disabled selected>Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $post->category->id ? 'selected' : '' }}>{{ $category->category }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for='tags'>Tags</label>
                        <select class="selects form-control @error('tags') is-invalid @enderror" name="tags[]" multiple="multiple">
                            @foreach ($tags as $item)
                            <option value="{{ $item->id }}"
                                @foreach ($post->tags as $tag)
                                    @if ($tag->id == $item->id)
                                        selected
                                    @endif
                                @endforeach
                                >{{ $item->tags }}
                            </option>
                        @endforeach
                          </select>
                        @error('tags')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-success">Edit Post</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.selects').select2({
            placeholder: 'Pilih Tag'
        });
        $('.select').select2({
            placeholder: 'Choose Kategori'
        });
    });
</script>
@endsection
