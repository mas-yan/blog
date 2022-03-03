@extends('layout.master')
@section('title','Add Tags')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6>Add Tags</h6>
                <a href="{{ route('tags.index') }}" class="btn btn-secondary">Back</a>
                <form action="{{ route('tags.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for='tags'>Tags</label>
                        <input type='text' name='tags' placeholder="Insert Tags" value="{{ old('tags') }}" id='tags' class='form-control @error('tags') is-invalid @enderror'>
                        @error('tags')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-success">Add Tags</button>
                </form>
        </div>
    </div>
</div>
@endsection
@section('script')