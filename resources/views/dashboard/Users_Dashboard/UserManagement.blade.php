@extends('Dashboard/Admins_Dashboard/Layout/MasterLayout')

@section('Content')

    <div class="row mb-4 user-management-top-section">
        <div class="col-md-4">
            <form action="#" method="get" class="user-search-form">
                <div class="input-group mb-3 mb-md-0"> <input type="text" name="search" class="form-control" placeholder="Search users..." value="">
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
                <h3>0</h3> </div>
        </div>
        <div class="col-md-4">
            <form action="#" method="get" class="user-filter-form">
                <div class="d-flex justify-content-md-end">
                    <select name="User_Role" class="form-select form-select-sm me-2" style="width: auto;">
                        <option selected>All Roles</option>
                        <option value="Administrator">Administrator</option>
                        <option value="Editor">Editor</option>
                        <option value="Viewer">Viewer</option>
                        <option value="User">User</option>
                    </select>
                    <button type="submit" name="submit" class="btn btn-sm btn-outline-success">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="text-center">
                            <th width="5%">Id</th>
                            <th width="25%">User Name</th>
                            <th width="20%">Email</th>
                            <th width="15%">Role</th>
                            <th width="15%">Posts</th>
                            <th width="20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td colspan="6"> <div class="no-users-message">
                                    <strong>No users found.</strong> You can add a new user by clicking the button below.
                                </div>
                            </td>
                        </tr>

                        <tr class="text-center">
                            <td>1</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                                    <img src="https://via.placeholder.com/40/6c5ce7/ffffff?text=AD" alt="Admin Avatar" class="user-avatar me-2">
                                    <div>
                                        <strong>John Doe</strong>
                                        <div class="text-muted small">Registered: 2025-07-23</div>
                                    </div>
                                </div>
                            </td>
                            <td>john@example.com</td>
                            <td><span class="badge role-badge bg-primary">Admin</span></td>
                            <td>42</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <button type="button" class="btn btn-sm btn-outline-danger action-btn delete-user-btn" 
                                            data-bs-toggle="modal" data-bs-target="#deleteUserModal" 
                                            data-id="1" data-name="John Doe">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="text-center">
                            <td>2</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                                    <img src="https://via.placeholder.com/40/20c997/ffffff?text=ED" alt="Editor Avatar" class="user-avatar me-2">
                                    <div>
                                        <strong>Jane Smith</strong>
                                        <div class="text-muted small">Registered: 2025-07-20</div>
                                    </div>
                                </div>
                            </td>
                            <td>jane@example.com</td>
                            <td><span class="badge role-badge bg-info">Editor</span></td>
                            <td>18</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <button type="button" class="btn btn-sm btn-outline-danger action-btn delete-user-btn" 
                                            data-bs-toggle="modal" data-bs-target="#deleteUserModal" 
                                            data-id="2" data-name="Jane Smith">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="text-center">
                            <td>3</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                                    <img src="https://via.placeholder.com/40/6c757d/ffffff?text=US" alt="User Avatar" class="user-avatar me-2">
                                    <div>
                                        <strong>Peter Jones</strong>
                                        <div class="text-muted small">Registered: 2025-07-15</div>
                                    </div>
                                </div>
                            </td>
                            <td>peter@example.com</td>
                            <td><span class="badge role-badge bg-secondary">User</span></td>
                            <td>3</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <button type="button" class="btn btn-sm btn-outline-danger action-btn delete-user-btn" 
                                            data-bs-toggle="modal" data-bs-target="#deleteUserModal" 
                                            data-id="3" data-name="Peter Jones">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card add-user-card top_border mb-4 mb-lg-0"> <div class="card-header">
                    <h5 class="mb-0 text-center gradient-text"><i class="fas fa-user-plus me-2"></i> Add New User</h5>
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">User Name</label>
                            <input type="text" name="user_name" class="form-control" id="username" placeholder="e.g., John Doe">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="e.g., user@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" class="form-select" id="role">
                                <option value="User" selected>User</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Editor">Editor</option>
                                <option value="Viewer">Viewer</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number (Optional)</label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="e.g., +8801XXXXXXXXX">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" id="confirmPassword" placeholder="Confirm password">
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

    <nav aria-label="Page navigation" class="mt-4">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>

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
                form.action = `/admin/users/delete/${userId}`; // Example URL: /admin/users/delete/1
            });
        });
    </script>

@endsection