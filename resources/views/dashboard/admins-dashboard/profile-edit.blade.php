@extends('dashboard/admins-dashboard/layout/master-layout')

@section('content')

    <div class="container py-4">
        <div class="profile-container">
            <div class="profile-header">
                <h1 class="profile-name">Edit Profile</h1>
                <p class="profile-title">Update your personal information</p>
            </div>

            <div class="profile-body">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="container d-flex justify-content-center">
                        <div class="row w-100">
                            <div class="col-md-6 offset-md-3">
                                <!-- Full Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control" required>
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control" required>
                                </div>

                                <!-- Phone -->
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" id="phone" name="phone" value="{{ $user->phone}}" class="form-control">
                                </div>

                                <!-- Gender -->
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select id="gender" name="gender" class="form-select">
                                        @foreach ($genders as $gender)
                                            <option {{$user->gender == $gender ? 'selected' : ''}} value="{{ $gender }}">{{ $gender }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Upload & Preview -->
                                <div class="row align-items-center mb-3">
                                    <!-- Upload Field -->
                                    <div class="col-6">
                                        <label for="image" class="form-label">Upload Picture</label>
                                        <input type="file" id="image" name="image" class="form-control">
                                    </div>

                                    <!-- Image Preview -->
                                    <div class="col-6 text-center">
                                        <label class="form-label">Preview</label><br>
                                        <img id="image-preview" src="{{ asset('storage/'.$user->image) }}" alt="Profile Picture" class="img-thumbnail" style="width: 120px; height: 120px; object-fit: cover;">
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="d-flex justify-content-center mt-4">
                                    <button type="submit" class="btn btn-success me-2">
                                        <i class="fas fa-save me-2"></i> Update
                                    </button>
                                    <a href="#" class="btn btn-secondary">
                                        <i class="fas fa-times me-2"></i> Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('image-preview');
        });
    </script>

@endsection