@extends('auth.layout.master')

@section('content')
<div class="col-6 d-flex flex-column mx-auto">
    <div class="card card-plain mt-8">
      <div class="card-header pb-0 text-left bg-transparent">
        <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
        <p class="mb-0">Enter your email and password to sign in</p>
      </div>
      <div class="card-body">
        <form method="POST" role="form" action="{{ route('login') }}">
            @csrf
          <label>Email</label>
          <div class="mb-3">
            <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <label>Password</label>
          <div class="mb-3">
            <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">Remember me</label>
          </div>
          <div class="text-center">
            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
          </div>
        </form>
      </div>
      <div class="card-footer text-center pt-0 px-lg-2 px-1">
        <p class="mb-4 text-sm mx-auto">
          Don't have an account?
          <a href="/register" class="text-info text-gradient font-weight-bold">Sign up</a>
        </p>
      </div>
    </div>
  </div>
@endsection
