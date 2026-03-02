@extends('dashboard/admins-dashboard/layout/master-layout')

@section('content')

    <div>
        <h6 class="text-uppercase text-end" style="color: #330867; font-size: 14px;">home / {{ $title }}</h6>
    </div>

    <div class="row mt-3">
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
                                @foreach ($categories as $category)
                                <tr class="text-center">
                                    <td>{{ $category->id }}</td>
                                    <td><strong>{{ $category->categories_name}}</strong></td>
                                    <td>{{ $category->categories_slug }}</td>
                                    <td><span class="badge badge-count">{{ $category->posts_count }}</span></td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="#" class="btn btn-sm btn-outline-danger action-btn"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteConfirmModal"
                                                data-id="{{ $category->id }}">
                                                    <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
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
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="categoryName" placeholder="Enter your name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="categorySlug" class="form-label">Slug (Unique)</label>
                            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="categorySlug" placeholder="Enter unique slug">
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="categoryDescription" class="form-label">Description (Optional)</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="categoryDescription" rows="3" placeholder="Enter your description"></textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" name="submit" class="btn btn-primary w-100">
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
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteConfirmModalLabel">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this category?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const deleteModal = document.getElementById('deleteConfirmModal');
            deleteModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const categoryId = button.getAttribute('data-id');
                const form = deleteModal.querySelector('#deleteForm');
                const actionUrl = "{{ url('admin/categories') }}/" + categoryId;
                form.action = actionUrl;
            });
    </script>

@endsection