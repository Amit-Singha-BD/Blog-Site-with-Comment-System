@extends('dashboard/admins-dashboard/layout/master-layout')

@section('content')

    <div>
        <h6 class="text-uppercase text-end" style="color: #330867; font-size: 14px;">home / {{ $title }}</h6>
    </div>

    <div class="row justify-content-center text-center gy-3 filter-section mt-4">
        <div class="col-12 col-md-4 my-auto">
            <form action="{{ route('admin.search')}}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="@error('search') {{ $message }} @else Search posts... @enderror">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <div class="col-12 col-md-4 my-auto">
            <div class="pending-count-card">
                <h6>
                    <i class="fas fa-file-alt"></i>
                    <span>Total Posts</span>
                </h6>
                <h3>{{ $postCount }}</h3>
            </div>
        </div>

        <div class="col-12 col-md-4 my-auto">
            <form action="{{ route('admin.filter') }}" method="GET">
                <div class="d-flex flex-column flex-md-row justify-content-center justify-content-md-end gap-2">
                    <select name="post_status" class="form-select form-select-sm">
                        <option value="all" {{ request('post_status') == 'all' ? 'selected' : '' }}>Select Status</option>
                        <option value="Published" {{ request('post_status') == 'Published' ? 'selected' : '' }}>Published</option>
                        <option value="Draft" {{ request('post_status') == 'Draft' ? 'selected' : '' }}>Draft</option>
                        <option value="Pending" {{ request('post_status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    </select>
                    <select name="post_categories" class="form-select form-select-sm">
                        <option value="all" {{ request('post_categories') == 'all' ? 'selected' : '' }}>Select Categories</option>
                        <option value="1" {{ request('post_categories') == '1' ? 'selected' : '' }}>Technology</option>
                        <option value="2" {{ request('post_categories') == '2' ? 'selected' : '' }}>Health</option>
                        <option value="3" {{ request('post_categories') == '3' ? 'selected' : '' }}>Travel</option>
                        <option value="4" {{ request('post_categories') == '4' ? 'selected' : '' }}>Education</option>
                        <option value="5" {{ request('post_categories') == '5' ? 'selected' : '' }}>Business</option>
                    </select>
                    <button type="submit" name="submit" class="btn btn-sm btn-outline-secondary">Filter</button>
                </div>
            </form>
        </div>
    </div>

    @if ((Route::currentRouteName() === 'admin.search'))
    <div class="search-result-info mb-3">
        <h4 class="text-center">Search Result <span class="fw-normal">for "{{ $searchResult }}"</span></h4>
        <div class="d-flex flex-column flex-md-row justify-content-between">
            <h6 class="mb-2 mb-md-0 fw-bold">Search Keyword : <span class="fw-normal">{{ $searchKeyword }}</span></h6>
            <h6 class="fw-bold">Search Post : <span class="fw-normal">{{ $postCount }}</span></h6>
        </div>
    </div>
    @endif

    <div class="custom-modern-table">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr class="text-center">
                        <th width="5%">Id</th>
                        <th width="15%">Title</th>
                        <th width="10%">Status</th>
                        <th width="15%">Author</th>
                        <th width="10%">Categories</th>
                        <th width="30%">Description</th>
                        <th width="15%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr class="text-center">
                        <td data-label="Id">{{ $post->id }}</td>
                        <td data-label="Title"><strong>{{ Str::limit($post->post_title, 15, '...') }}</strong></td>
                        <td data-label="Status">
                            <span class="badge status-badge bg-primary">{{ $post->status }}</span>
                        </td>
                        <td data-label="Author">{{ $post->user->name }}</td>
                        <td data-label="Categories">{{ $post->category->categories_name }}</td>
                        <td data-label="Description">{{ Str::limit($post->description, 30, '...') }}</td>
                        <td data-label="Actions">
                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-sm btn-outline-primary action-btn" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-outline-success action-btn" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button"
                                    class="btn btn-sm btn-outline-danger action-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteConfirmModal"
                                    data-id="{{ $post->id }}">
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

    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>

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
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
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
            form.action = '/admin/posts/' + postId; // Update this action URL as per your backend route
        });
    </script>

@endsection