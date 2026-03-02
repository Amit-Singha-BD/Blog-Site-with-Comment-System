@extends('dashboard/admins-dashboard/layout/master-layout')

@section('content')

    <div>
        <h6 class="text-uppercase text-end" style="color: #330867; font-size: 14px;">home / {{ $title }}</h6>
    </div>

    <div class="row justify-content-center text-center gy-3 filter-section mt-4">
        <div class="col-12 col-md-4 my-auto">
            <form action="{{ route('admin.users.posts.search') }}" method="GET">
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
                    <i class="fas fa-newspaper"></i>
                    <span>Pending Posts</span>
                </h6>
                <h3>{{ $postCount }}</h3>
            </div>
        </div>

        <div class="col-12 col-md-4 my-auto">

        </div>
    </div>

    @if (Route::currentRouteName() == 'admin.users.posts.search')
    <div class="search-result-info mb-3">
        <h4 class="text-center">Search Result <span class="fw-normal">{{ $searchResult }}</span></h4>
        <div class="d-flex flex-column flex-md-row justify-content-between">
            <h6 class="mb-2 mb-md-0">Search Keyword : <span class="fw-normal text-muted"{{ $searchKeyword }}</span></h6>
            <h6>Search Post : <span class="fw-normal text-muted">{{ $searchCount }}</span></h6>
        </div>
    </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr class="text-center">
                    <th width="5%">Id</th>
                    <th width="15%">Title</th>
                    <th width="10%">Status</th>
                    <th width="15%">Author</th>
                    <th width="10%">Categories</th>
                    <th width="30%">Description</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ( $postCount < 0)
                <tr>
                    <td colspan="7">
                        <div class="no-post-message text-center">
                            <strong>No users posts available.</strong> All submitted posts are currently approved or pending.
                        </div>
                    </td>
                </tr>
                @endif

                @foreach ($posts as $post)
                <tr class="text-center">
                    <td>{{ $post->id }}</td>
                    <td><strong>{{ Str::limit($post->post_title, 15, '...') }}</strong></td>
                    <td><span class="badge bg-primary status-badge ms-2">{{ $post->status }}</span></td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->category->categories_name }}</td>
                    <td>{{ Str::limit($post->description, 30, '...') }}</td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('admin.posts.show', $post->id )}}" class="btn btn-sm btn-outline-primary action-btn" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.posts.accept', $post->id) }}" class="btn btn-sm btn-outline-success action-btn" title="Accept" data-bs-toggle="modal" data-bs-target="#acceptModal">
                                <i class="fa-solid fa-circle-check"></i>
                            </a>
                            <a href="{{ route('admin.posts.reject', $post->id) }}" class="btn btn-sm btn-outline-danger action-btn" title="Reject" data-bs-toggle="modal" data-bs-target="#rejectModal">
                                <i class="fa-solid fa-xmark"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>

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
                    <form id="acceptForm" method="POST">
                        @csrf
                        @method('PATCH')
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
                    <form id="rejectForm" method="POST">
                        @csrf
                        @method('PATCH')
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
                form.action = `/admin/posts/${postId}/accept/`; // Update with your actual accept route
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
                form.action = `/admin/posts/${postId}/reject/`; // Update with your actual reject route
            });
        });
    </script>

@endsection