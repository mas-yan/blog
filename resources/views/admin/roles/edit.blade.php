@extends('layout.master')
@section('title','Edit Role')
@section('content')
{{-- @foreach ($permissions as $permission)
    @foreach (old('permissions', $role->permissions) as $item)
        {{ $item->id == $permission->id ? $item->name : '' }}
    @endforeach
@endforeach
@dd('ok'); --}}
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6>Edit Role</h6>
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
                                        @if (old('permissions',$role->permissions))
                                            @foreach (old('permissions', $role->permissions) as $item)
                                                {{ $item->id == $permission->id ? 'checked' : '' }}
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
                    <button class="btn btn-success">Edit Role</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        function toggle(source) {
            let checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
            }
        }
    </script>
@endsection