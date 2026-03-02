@extends('dashboard/admins-dashboard/layout/master-layout')

@section('content')

    <div class="row">
        <div>
            <h6 class="text-uppercase text-end" style="color: #330867; font-size: 14px;">home / {{ $title }}</h6>
        </div>
    </div>

    <div class="row mb-4 user-management-top-section filter-section">
        <div class="col-md-4 my-auto">
            <form action="{{ route('admin.users.search') }}" method="GET" class="user-search-form">
                <div class="input-group mb-3 mb-md-0">
                    <input type="text" name="search" class="form-control" placeholder="@error('search') {{ $message }} @else Search users... @enderror" value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-4 mb-3 mb-md-0"> <div class="total-users-card">
                <h6>
                    <i class="fas fa-users"></i>
                    <span>Total Users</span>
                </h6>
                <h3>{{ $userCount }}</h3> </div>
        </div>

        <div class="col-md-4 my-auto">
            <form action="{{ route('admin.users.filter') }}" method="GET" class="user-filter-form">
                <div class="d-flex justify-content-md-end">
                    <select name="users_role" class="form-select form-select-sm me-2" style="width: auto;">
                        <option value="all" selected>All Roles</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role }}" {{ request('users_role') == $role ? 'selected' : '' }}>{{ $role }}</option>
                        @endforeach
                    </select>
                    <button type="submit" name="submit" class="btn btn-sm btn-outline-success">Filter</button>
                </div>
            </form>
        </div>
    </div>

    @if ((Route::currentRouteName() === 'admin.users.search'))
        <div class="search-result-info mb-3">
            <h4 class="text-center">Search Result <span class="fw-normal">for "{{ $searchResult }}"</span></h4>
            <div class="d-flex flex-column flex-md-row justify-content-between">
                <h6 class="mb-2 mb-md-0 fw-bold">Search Keyword : <span class="fw-normal">{{ $searchKeyword }}</span></h6>
                <h6 class="fw-bold">Search Post : <span class="fw-normal">{{ $searchCount }}</span></h6>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="text-center">
                            <th width="5%">Id</th>
                            <th width="35%">User Name</th>
                            <th width="20%">Email</th>
                            <th width="15%">Role</th>
                            <th width="10%">Posts</th>
                            <th width="15%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($userCount < 0)
                        <tr class="text-center">
                            <td colspan="6"> <div class="no-users-message">
                                    <strong>No users found.</strong> You can add a new user by clicking the button below.
                                </div>
                            </td>
                        </tr>
                        @endif

                        @foreach ($users as $user)
                        <tr class="text-center">
                            <td>{{ $user->id }}</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                                    <img src="{{ asset('storage/' . ($user->image ?? 'user.png')) }}" alt="Admin Avatar" class="user-avatar me-2">
                                    <div>
                                        <strong>{{ $user->name }}</strong>
                                        <div class="text-muted small">{{ $user->created_at }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td><span class="badge role-badge bg-primary">{{ $user->role }}</span></td>
                            <td>{{ $user->posts_count }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <button type="button" class="btn btn-sm btn-outline-danger action-btn delete-user-btn" 
                                            data-bs-toggle="modal" data-bs-target="#deleteUserModal" 
                                            data-id="{{ $user->id }}" data-name="John Doe">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card add-user-card top_border mb-4 mb-lg-0"> <div class="card-header">
                    <h5 class="mb-0 text-center gradient-text"><i class="fas fa-user-plus me-2"></i> Add New User</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">User Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="username" placeholder="John Doe">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="user@example.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="01XXXXXXXXX">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" class="form-select @error('role') is-invalid @enderror" id="role">
                                <option value="User" selected>Select Roles</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
                            @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Profile Photo</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="photo" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control @error('post_title') is-invalid @enderror" id="confirmPassword" placeholder="Confirm password">
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" name="submit" class="btn btn-primary w-100">
                                <i class="fas fa-user-plus me-2"></i> Add New User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $users->links('pagination::bootstrap-5') }}
    </div>

    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white"> <h5 class="modal-title" id="deleteUserModalLabel"><i class="fas fa-exclamation-triangle me-2"></i> Confirm Delete</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    Are you sure you want to delete user: <strong><span id="deleteUserName"></span></strong>? This action cannot be undone.
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteUserForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteModal = document.getElementById('deleteUserModal');
            deleteModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget; // Button that triggered the modal
                const userId = button.getAttribute('data-id');
                const userName = button.getAttribute('data-name');

                const modalUserNameSpan = deleteModal.querySelector('#deleteUserName');
                const form = deleteModal.querySelector('#deleteUserForm');

                if (modalUserNameSpan) {
                    modalUserNameSpan.textContent = userName; // Set the user name in the modal body
                }
                
                // Update the form action URL
                // Adjust this URL to match your backend's delete route
                form.action = `/admin/users/${userId}`; // Example URL: /admin/users/delete/1
            });
        });
    </script>

@endsection