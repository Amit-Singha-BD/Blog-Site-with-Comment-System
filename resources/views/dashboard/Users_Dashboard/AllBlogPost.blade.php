@extends('Dashboard/Admins_Dashboard/Layout/MasterLayout')

@section('Content')

    <div class="row mb-3 filter-section">
        <div class="col-md-4 mb-3 mb-md-0">
            <form action="#" method="get">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search posts...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-4 mb-3 mb-md-0">
            <div class="result-count-card">
                <h6><span>Result Count</span></h6>
                <h3>10</h3>
            </div>
        </div>
        <div class="col-md-4">
            <form action="#" method="get">
                <div class="d-flex justify-content-md-end">
                    <select name="post_status" class="form-select form-select-sm me-2" style="width: auto;">
                        <option value="all">All Status</option>
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                        <option value="pending">Pending</option>
                    </select>
                    <select name="post_category" class="form-select form-select-sm me-2" style="width: auto;">
                        <option value="all">All Categories</option>
                        <option value="1">Technology</option>
                        <option value="2">Health</option>
                        <option value="3">Travel</option>
                        <option value="4">Education</option>
                        <option value="5">Cooking</option>
                    </select>
                    <button type="submit" class="btn btn-sm btn-outline-secondary">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <div class="search-result-info mb-3">
        <h4 class="text-center">Search Result <span class="fw-normal">for "example"</span></h4>
        <div class="d-flex flex-column flex-md-row justify-content-between">
            <h6 class="mb-2 mb-md-0">Search Keyword : <span class="fw-normal">example</span></h6>
            <h6>Search Post : <span class="fw-normal">5</span></h6>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr class="text-center">
                    <th width="5%">Id</th>
                    <th width="30%">Title</th>
                    <th width="10%">Status</th>
                    <th width="15%">Author</th>
                    <th width="15%">Categories</th>
                    <th width="10%">Date</th>
                    <th width="15%">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>1</td>
                    <td><strong>Sample Post Title</strong></td>
                    <td><span class="badge status-badge bg-primary">Published</span></td>
                    <td>John Doe</td>
                    <td>Technology</td>
                    <td>2 hours ago</td>
                    <td>
                        <a href="{{ route('postView') }}" class="btn btn-sm btn-outline-primary action-btn" title="View">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('postEdit') }}" class="btn btn-sm btn-outline-success action-btn" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="button"
                            class="btn btn-sm btn-outline-danger action-btn"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteConfirmModal"
                            data-id="1">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>2</td>
                    <td><strong>Another Draft Post</strong></td>
                    <td><span class="badge status-badge bg-info">Draft</span></td>
                    <td>Jane Smith</td>
                    <td>Health</td>
                    <td>Yesterday</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-outline-primary action-btn" title="View">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-success action-btn" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="button"
                            class="btn btn-sm btn-outline-danger action-btn"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteConfirmModal"
                            data-id="2">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>3</td>
                    <td><strong>Travel Adventure Guide</strong></td>
                    <td><span class="badge status-badge bg-warning">Pending</span></td>
                    <td>Peter Jones</td>
                    <td>Travel</td>
                    <td>3 days ago</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-outline-primary action-btn" title="View">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-success action-btn" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="button"
                            class="btn btn-sm btn-outline-danger action-btn"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteConfirmModal"
                            data-id="3">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
        </table>
    </div>

    <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
        <a class="page-link" href="#">Next</a>
        </li>
    </ul>
    </nav>

    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteConfirmModalLabel">Confirm Delete</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete this post? This action cannot be undone.
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Cancel</button>
            <form id="deleteForm" method="POST" action="#">
                <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </form>
        </div>
        </div>
    </div>
    </div>

    <script>
        const deleteModal = document.getElementById('deleteConfirmModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            const button = event.relatedTarget;
            // Extract info from data-bs-* attributes
            const postId = button.getAttribute('data-id');
            // Update the modal's content.
            const form = deleteModal.querySelector('#deleteForm');
            // Assuming your delete route is something like /admin/posts/delete/{id}
            form.action = '/admin/posts/delete/' + postId; // Update this action URL as per your backend route
        });
    </script>

@endsection