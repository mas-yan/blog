@extends('layout.master')
@section('title','Edit Menu')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6>Edit Menu</h6>
                <a href="{{ route('menu.index') }}" class="btn btn-secondary">Back</a>
                <form action="{{ route('menu.update', $menu->slug) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for='menu'>Menu</label>
                        <input type='text' name='menu' placeholder="Insert menu" value="{{ old('menu', $menu->menu) }}" id='menu' class='form-control @error('menu') is-invalid @enderror'>
                        @error('menu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for='link'>Link</label>
                        <input type='text' name='link' placeholder="Insert Link" value="{{ old('link', $menu->link) }}" id='link' class='form-control @error('link') is-invalid @enderror'>
                        @error('link')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-success">Edit Menu</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection