@extends('layout.master')
@section('title','Add User')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6>Add User</h6>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                <form action="{{  route('users.store')  }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for='name'>Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for='email'>Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for='password'>Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for='password-confirm'>Password Confirm</label>
                        <input id="password-confirm" type="password" class="form-control" placeholder="Password Confirmation" name="password_confirmation" autocomplete="new-password">
                    </div>
                    <label>Role</label>
                        @foreach ($roles as $role)
                        <div class="form-check">
                            <input class="form-check-input" name="role[]" type="checkbox" value="{{ $role->name }}" id="role{{ $role->id }}" 
                            @if (old('role'))
                                @foreach (old('role') as $value)
                                    @if ($value == $role->name)
                                        checked
                                    @endif
                                @endforeach
                            @endif

                            >
                            <label class="form-check-label" for="role{{ $role->id }}">
                                {{ $role->name }}
                            </label>
                        </div>
                        @endforeach
                        @error('role')
                            <p class="text-danger" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    <button class="btn btn-success" type="submit">Add User</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
