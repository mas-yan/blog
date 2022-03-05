@extends('layout.master')
@section('title','Add Category')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6>Add Category</h6>
                <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for='role'>Role</label>
                        <input type='text' name='role' placeholder="Insert Role" value="{{ old('role') }}" id='role' class='form-control @error('role') is-invalid @enderror'>
                        @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-success">Add Role</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection