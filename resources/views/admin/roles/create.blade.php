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
                    <label>Permissions</label>
                    <div class="col-md-2 d-flex justify-content-center border border-dark border rounded-pill mb-3">
                        <div class="form-check px-2 pt-2">
                            <input type="checkbox" class="form-check-input" id="checkAll" onclick="toggle(this);" />
                            <label class="form-check-label" for="checkAll">
                                <b>Check all?</b>
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            @foreach ($permissions as $permission)
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" 
                                        @if (old('permissions'))
                                            @foreach (old('permissions') as $item)
                                                {{ $item == $permission->id ? 'checked' : '' }}
                                            @endforeach
                                        @endif
                                        value="{{ $permission->id }}" id="{{ $permission->id }}" name="permissions[]">
                                        <label class="form-check-label" for="{{ $permission->id }}">
                                        {{ $permission->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button class="btn btn-success">Add Role</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        function toggle(source) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
            }
        }
    </script>
@endsection