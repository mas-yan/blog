@extends('layout.master')
@section('title','Edit Category')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6>Edit Category</h6>
                <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
                <form action="{{ route('roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for='name'>Role</label>
                        <input type='text' name='name' placeholder="Insert Role" value="{{ old('name',$role->name) }}" id='name' class='form-control @error('name') is-invalid @enderror'>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-success">Edit Role</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection