@extends('auth.layout.master-layout')

@section('content')

  <div class="login-card">
    <div class="text-center mb-4">
      <div class="animated-text">My Blog!</div>
    </div>

    <form action="{{ route('login.post') }}" method="post">
      @csrf

      <div class="mb-3">
        <label for="email" class="form-label"></label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email Address" value="{{ old('email') }}">
        @error('email')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="mb-3">
        <label for="password" class="form-label"></label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
        @error('password')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="mb-3 text-end">
        <a href="#" class="text-decoration-none" style="color:#2575fc;">Forgot Password?</a>
      </div>

      <div class="d-grid">
        <button type="submit" name="submit" class="btn btn-primary">Login</button>
      </div>
    </form>

    <div class="form-footer mt-4">
      Don't have an account? <a href="{{ route('register') }}">Register here</a>
    </div>
  </div>

@endsection