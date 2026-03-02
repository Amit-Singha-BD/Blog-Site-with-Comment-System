@extends('Dashboard/Admins_Dashboard/Layout/MasterLayout')

@section('Content')

    <div class="row mb-3 filter-section">
        <div class="col-md-4">
            <form action="#" method="get">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Search posts...">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-4 mb-3 mb-md-0">
            <div class="pending-count-card">
                <h6>
                    <i class="fas fa-file-alt"></i>
                    <span>Pending Posts</span>
                </h6>
                <h3>4</h3>
            </div>
        </div>
        <div class="col-md-4">
            </div>
    </div>

    <div class="search-result-info mb-3">
        <h4 class="text-center">Search Result <span class="fw-normal">4 results found</span></h4>
        <div class="d-flex flex-column flex-md-row justify-content-between">
            <h6 class="mb-2 mb-md-0">Search Keyword : <span class="fw-normal text-muted">example</span></h6>
            <h6>Search Post : <span class="fw-normal text-muted">4</span></h6>
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
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>1</td>
                    <td><strong>Example Post Title That Is Quite Long and Descriptive...</strong></td>
                    <td><span class="badge bg-primary status-badge ms-2">Pending</span></td>
                    <td>John Doe</td>
                    <td>Tech, Programming</td>
                    <td>2 hours ago</td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="#" class="btn btn-sm btn-outline-primary action-btn" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-success action-btn" title="Accept" data-bs-toggle="modal" data-bs-target="#acceptModal">
                                <i class="fa-solid fa-circle-check"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-danger action-btn" title="Reject" data-bs-toggle="modal" data-bs-target="#rejectModal">
                                <i class="fa-solid fa-xmark"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>2</td>
                    <td><strong>Another Pending Post About Design Trends</strong></td>
                    <td><span class="badge bg-primary status-badge ms-2">Pending</span></td>
                    <td>Jane Smith</td>
                    <td>Design</td>
                    <td>1 day ago</td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="#" class="btn btn-sm btn-outline-primary action-btn" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-success action-btn" title="Accept" data-bs-toggle="modal" data-bs-target="#acceptModal">
                                <i class="fa-solid fa-circle-check"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-danger action-btn" title="Reject" data-bs-toggle="modal" data-bs-target="#rejectModal">
                                <i class="fa-solid fa-xmark"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>

    <div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="acceptLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="acceptLabel">Accept Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    Are you sure you want to accept the post <strong id="acceptPostTitle">Example Post Title</strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="acceptForm" action="#" method="POST">
                        <button type="submit" class="btn btn-success">Yes, Accept</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="rejectLabel">Reject Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    Are you sure you want to reject the post <strong id="rejectPostTitle">Example Post Title</strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="rejectForm" action="#" method="POST">
                        <button type="submit" class="btn btn-danger">Yes, Reject</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Accept Modal dynamic content
            const acceptModal = document.getElementById('acceptModal');
            acceptModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget; // Button that triggered the modal
                const postId = button.closest('tr').querySelector('td:first-child').textContent; // Get Post ID
                const postTitle = button.closest('tr').querySelector('td:nth-child(2) strong').textContent; // Get Post Title

                const modalTitleElement = acceptModal.querySelector('#acceptPostTitle');
                const form = acceptModal.querySelector('#acceptForm');

                modalTitleElement.textContent = postTitle;
                form.action = `/admin/posts/accept/${postId}`; // Update with your actual accept route
            });

            // Reject Modal dynamic content
            const rejectModal = document.getElementById('rejectModal');
            rejectModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget; // Button that triggered the modal
                const postId = button.closest('tr').querySelector('td:first-child').textContent; // Get Post ID
                const postTitle = button.closest('tr').querySelector('td:nth-child(2) strong').textContent; // Get Post Title

                const modalTitleElement = rejectModal.querySelector('#rejectPostTitle');
                const form = rejectModal.querySelector('#rejectForm');

                modalTitleElement.textContent = postTitle;
                form.action = `/admin/posts/reject/${postId}`; // Update with your actual reject route
            });
        });
    </script>

@endsection