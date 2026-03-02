@extends('auth.layout.master-layout')

@section('content')

<div class="register-card">
  <div class="text-center mb-4">
    <div class="animated-text">Create Account</div>
  </div>
  <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Full Name</label>
      <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
    </div>

    <div class="mb-3">
      <label for="phone" class="form-label">Phone Number</label>
      <div class="input-group">
        <span class="input-group-text">+880</span>
        <input type="text" name="phone" class="form-control" id="phone" placeholder="1XXXXXXXXX">
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Gender</label>
      <div class="d-flex gap-3">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male">
          <label class="form-check-label" for="genderMale">Male</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female">
          <label class="form-check-label" for="genderFemale">Female</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="genderOther" value="Other">
          <label class="form-check-label" for="genderOther">Other</label>
        </div>
      </div>
    </div>

    <div class="mb-3">
      <label for="photo" class="form-label">Profile Photo</label>
      <input type="file" name="image" class="form-control" id="photo" accept="image/*">
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="Create password">
    </div>

    <div class="mb-3">
      <label for="confirmPassword" class="form-label">Confirm Password</label>
      <input type="password" name="password_confirmation" class="form-control" id="confirmPassword" placeholder="Confirm password">
    </div>

    <div class="d-grid">
      <button type="submit" name="submit" class="btn btn-primary">Register</button>
    </div>
  </form>

  <div class="form-footer mt-4">
    Already have an account? <a href="{{ route('login') }}">Login here</a>
  </div>
</div>

@endsection