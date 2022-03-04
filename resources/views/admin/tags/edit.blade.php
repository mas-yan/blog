@extends('layout.master')
@section('title','Edit Tags')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6>Edit Tags</h6>
                <a href="{{ route('tags.index') }}" class="btn btn-secondary">Back</a>
                <form action="{{ route('tags.update', $tag->slug) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for='tags'>Tags</label>
                        <input type='text' name='tags' placeholder="Insert Tags" value="{{ old('tags', $tag->tags) }}" id='tags' class='form-control @error('tags') is-invalid @enderror'>
                        @error('tags')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-success">Update Tags</button>
                </form>
        </div>
    </div>
</div>
@endsection