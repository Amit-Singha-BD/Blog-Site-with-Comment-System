@extends('Dashboard/Admins_Dashboard/Layout/MasterLayout')

@section('Content')

    <div class="row mb-3 filter-section">
        <div class="col-md-4 mb-3 mb-md-0">
            <form action="#" method="get">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search posts...">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-4 mb-3 mb-md-0">
            <div class="result-count-card">
                <h6>
                    <span>Result Count</span>
                </h6>
                <h3>0</h3>
            </div>
        </div>
        <div class="col-md-4">
            </div>
    </div>

    <div class="search-result-info mb-3">
        <h4 class="text-center">Search Result <span class="fw-normal">for "Keyword"</span></h4>
        <div class="d-flex flex-column flex-md-row justify-content-between">
            <h6 class="mb-2 mb-md-0">Search Keyword : <span class="fw-normal">Keyword</span></h6>
            <h6>Search Post : <span class="fw-normal">0</span></h6>
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
                <tr>
                    <td colspan="7"> <div class="no-post-message">
                            <strong>No post found.</strong> You can add a new post by clicking the button below.
                            <a href="/admin/posts/create" class="btn btn-primary mt-3">
                                <i class="fas fa-plus-circle me-2"></i>Create New Post
                            </a>
                        </div>
                    </td>
                </tr>

                </tbody>
        </table>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#">Previous</a>
            </li>
            <li class="page-item active">
                <a class="page-link" href="#">1</a>
            </li>
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
            আপনি কি নিশ্চিত এই পোস্টটি মুছে ফেলতে চান? এই অ্যাকশন পূর্বাবস্থায় ফিরিয়ে আনা যাবে না।
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">না, বাতিল করুন</button>
            <form id="deleteForm" method="POST" action="#">
                <button type="submit" class="btn btn-danger">হ্যাঁ, মুছে ফেলুন</button>
            </form>
        </div>
        </div>
    </div>
    </div>

    <script>
        const deleteModal = document.getElementById('deleteConfirmModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const postId = button.getAttribute('data-id');
            const form = deleteModal.querySelector('#deleteForm');
            form.action = '/admin/post/delete/' + postId; // আপনার ব্যাকএন্ড রাউট অনুযায়ী এই URL টি আপডেট করুন
        });
    </script>

@endsection