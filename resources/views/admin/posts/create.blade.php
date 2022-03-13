@extends('layout.master')
@section('title','Add Post')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6>Add Post</h6>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for='title'>Title</label>
                        <input type='text' name='title' placeholder="Insert Article" value="{{ old('title') }}" id='title' class='form-control @error('title') is-invalid @enderror'>
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for='article'>Article</label>
                        <textarea name='article' placeholder="Insert Article" id='article' class='form-control @error('article') is-invalid @enderror'>{{ old('article') }}</textarea>
                        @error('article')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for='category'>Category</label>
                        <select class="select form-control @error('category') is-invalid @enderror" name="category">
                            <option disabled selected>Choose Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == old('category')? 'selected' : '' }}>{{ $category->category }}</option>
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
                            @if (old('tags'))
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                    @foreach (old('tags') as $item)
                                        @if ($tag->id == $item)
                                            selected
                                        @endif
                                    @endforeach
                                        >{{ $tag->tags }}
                                    </option>
                                @endforeach
                            @else
                                @foreach ($tags as $tag)
                                <option value="{{ old('tags', $tag->id) }}">{{ $tag->tags }}</option>
                                @endforeach
                            @endif
                          </select>
                        @error('tags')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-success">Add Post</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: `/laravel-filemanager/upload?type=Files&_token=`
  };
  CKEDITOR.replace('article', options);
</script>
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
