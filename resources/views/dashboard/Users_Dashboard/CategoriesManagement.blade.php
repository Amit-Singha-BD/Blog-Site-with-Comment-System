@extends('Dashboard/Admins_Dashboard/Layout/MasterLayout')

@section('Content')

    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0 text-center gradient-text"><i class="fa-solid fa-tag me-2"></i> All Categories</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th width="5%">Id</th>
                                    <th width="30%">Name</th>
                                    <th width="20%">Slug</th>
                                    <th width="15%">Posts</th>
                                    <th width="30%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>1</td>
                                    <td><strong>Example Category 1</strong></td>
                                    <td>example-category-1</td>
                                    <td><span class="badge badge-count">24</span></td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <button type="button" 
                                                    class="btn btn-sm btn-outline-danger action-btn" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#deleteConfirmModal" 
                                                    data-id="1">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>2</td>
                                    <td><strong>Technology & Gadgets</strong></td>
                                    <td>tech-gadgets</td>
                                    <td><span class="badge badge-count">15</span></td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <button type="button" 
                                                    class="btn btn-sm btn-outline-danger action-btn" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#deleteConfirmModal" 
                                                    data-id="2">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>3</td>
                                    <td><strong>Food & Recipes</strong></td>
                                    <td>food-recipes</td>
                                    <td><span class="badge badge-count">8</span></td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <button type="button" 
                                                    class="btn btn-sm btn-outline-danger action-btn" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#deleteConfirmModal" 
                                                    data-id="3">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card top_border mb-4 mb-lg-0"> <div class="card-header">
                    <h5 class="mb-0 text-center gradient-text"><i class="fa-solid fa-plus-circle me-2"></i> Add New Category</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="categoryName" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label for="categorySlug" class="form-label">Slug (Unique)</label>
                            <input type="text" class="form-control" id="categorySlug" placeholder="Enter unique slug">
                        </div>
                        <div class="mb-3">
                            <label for="categoryDescription" class="form-label">Description (Optional)</label>
                            <textarea class="form-control" id="categoryDescription" rows="3" placeholder="Enter your description"></textarea>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-plus-circle me-2"></i> Add New Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white"> <h5 class="modal-title" id="deleteConfirmModalLabel"><i class="fas fa-exclamation-triangle me-2"></i> Confirm Delete</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button> </div>
                <div class="modal-body text-center">
                    Are you sure you want to delete the category: <strong><span id="modalCategoryName">Category Name</span></strong>? This action cannot be undone.
                </div>
                <div class="modal-footer justify-content-center"> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST" action="">
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteModal = document.getElementById('deleteConfirmModal');
            deleteModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget; // Button that triggered the modal
                const categoryId = button.getAttribute('data-id'); // Get ID from data-id attribute

                // Find the corresponding row to get the category name
                const row = button.closest('tr');
                const categoryName = row ? row.querySelector('td:nth-child(2) strong').textContent : 'N/A'; // Get Category Name

                const modalCategoryNameSpan = deleteModal.querySelector('#modalCategoryName');
                const form = deleteModal.querySelector('#deleteForm');

                if (modalCategoryNameSpan) {
                    modalCategoryNameSpan.textContent = categoryName; // Set the category name in the modal body
                }
                
                // Update the form action URL
                // Adjust this URL to match your backend's delete route
                form.action = `/admin/categories/delete/${categoryId}`; // Example URL: /admin/categories/delete/1
            });
        });
    </script>

@endsection