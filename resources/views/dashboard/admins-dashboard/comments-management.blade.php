@extends('dashboard/admins-dashboard/layout/master-layout')

@section('content')

    <div>
        <h6 class="text-uppercase text-end" style="color: #330867; font-size: 14px;">home / {{ $title }}</h6>
    </div>

    <div class="row mb-3 search-bulk-actions"> <div class="col-md-6">
            <div class="input-group mb-3 mb-md-0"> <input type="text" class="form-control" placeholder="Search comments...">
                <button class="btn btn-outline-secondary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        <div class="col-md-6"></div>
    </div>

    <div class="card comments-list-card">
        <div class="card-body p-0">
            <div class="list-group list-group-flush">
                @foreach ($comments as $comment)
                    <div class="list-group-item" @if (!empty($comment->reply_id)) style="margin-left: 30px;" @endif>
                        <img src="https://via.placeholder.com/50/6c5ce7/ffffff?text=U1" alt="User Avatar" class="comment-avatar">
                        <div class="comment-content-area">
                            <div class="comment-header">
                                <div>
                                    <span class="comment-author">{{ $comment->user->name }}</span>
                                    <span class="comment-meta d-block d-md-inline-block ms-md-2">on {{ $comment->post->post_title }}</span>
                                </div>
                                <span class="comment-meta">{{ $comment->created_at }}</span>
                            </div>
                            <p class="comment-text">{{ $comment->comment }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $comments->links('pagination::bootstrap-5') }}
    </div>

    <script>
        // Ensure Bootstrap JavaScript is loaded before this.
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    </script>

@endsection