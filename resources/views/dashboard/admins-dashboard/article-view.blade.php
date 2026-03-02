@extends('dashboard/admins-dashboard/layout/master-layout')

@section('content')

    <div>
        <h6 class="text-uppercase text-end" style="color: #330867; font-size: 14px;">home / {{ $title }}</h6>
    </div>

    <div class="row justify-content-center text-center gy-3 filter-section mt-4">
        <div class="col-12 col-md-4 my-auto">
            <form>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search posts...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <div class="col-12 col-md-4 my-auto">
            <div class="pending-count-card">
                <h6><i class="fas fa-file-alt"></i> <span>Total Posts</span></h6>
                <h3>120</h3>
            </div>
        </div>

        <div class="col-12 col-md-4 my-auto">
            <form>
                <div class="d-flex flex-column flex-md-row justify-content-center justify-content-md-end gap-2">
                    <select class="form-select form-select-sm">
                        <option>Select Status</option>
                        <option>Published</option>
                        <option>Draft</option>
                        <option>Pending</option>
                    </select>
                    <select class="form-select form-select-sm">
                        <option>Select Categories</option>
                        <option>Technology</option>
                        <option>Health</option>
                        <option>Travel</option>
                        <option>Education</option>
                        <option>Business</option>
                    </select>
                    <button type="submit" class="btn btn-sm btn-outline-secondary">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <div class="custom-modern-table mt-4">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr class="text-center">
                        <th>Id</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Tags</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr class="text-center">
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>
                                <span
                                    class="{{ $article->status == 'draft' ? 'status-inactive' : ($article->status == 'published' ? 'status-active' : 'status-pending') }}">
                                    {{ ucfirst($article->status) }}
                                </span>
                            </td>
                            <td>{{ $article->user->name ?? 'N/A' }}</td>
                            <td>{{ $article->category->categories_name ?? 'N/A' }}</td>
                            <td>{{ $article->tags }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                    <a href="{{ route('article.show', $article->id) }}" class="btn btn-sm btn-outline-primary action-btn" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('article.edit.view', $article->id) }}"
                                        class="btn btn-sm btn-outline-success action-btn" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-danger action-btn delete-btn"
                                        data-id="{{ $article->id }}" data-title="{{ $article->title }}"
                                        data-route="{{ route('article.destroy', $article->id) }}" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">
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

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        <nav>
            <ul class="pagination">
                <li class="page-item disabled"><a class="page-link">Previous</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>

    <!-- Single Global Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel">
                        <i class="fas fa-exclamation-triangle me-2"></i>Confirm Delete
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body text-center">
                    <p class="fs-6 mb-3">Are you sure you want to delete the article "<strong id="articleTitle"></strong>"?
                    </p>
                    <p class="text-muted">This action cannot be undone.</p>
                </div>

                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script>
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function () {
                const title = this.getAttribute('data-title');
                const route = this.getAttribute('data-route');

                document.getElementById('articleTitle').textContent = title;
                document.getElementById('deleteForm').setAttribute('action', route);
            });
        });
    </script>

@endsection