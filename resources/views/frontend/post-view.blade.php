@extends('frontend.layout.master-layout')

@section('content')

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="post-container p-4 p-md-5 mb-5">
                        <div class="mb-4 fade-in-up delay-1">
                            <h1 class="fw-bold post-title truncate-title animate-typing">{{ $post->post_title }}</h1>
                            <div class="d-flex align-items-center mt-3 flex-wrap">
                                <span class="category-badge me-3 mb-2 mb-sm-0"><i class="fa-solid fa-tag me-2"></i>{{ $post->category->categories_name }}</span>
                                <span class="date-text"><i class="far fa-clock me-2"></i>{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>

                        <div class="mb-4 fade-in-up delay-2">
                            <img src="{{ asset('storage/'.($post->image_path ?? 'blank_image.png')) }}"
                                 class="img-fluid post-image w-100" alt="Responsive Web Design">
                        </div>

                        <div class="d-flex align-items-center justify-content-end">
                            <span class="category-badge"><i class="fa-solid fa-pen-nib me-2"></i>{{ $post->user->name }}</span>
                        </div>

                        <div class="mb-5 fade-in-up delay-3">
                            <p class="fs-5 lh-lg">
                                {{ $post->description }}
                            </p>
                        </div>

                        <div class="mb-5 fade-in-up delay-4">
                            <h4 class="fw-bold mb-4 text-gradient">
                                Comments <span class="badge bg-primary text-white rounded-pill">{{ $comments->count() }}</span>
                            </h4>

                            @foreach ($comments as $comment)
                                <div class="row comment-card p-3 mb-3 rounded">
                                    {{-- মেইন কমেন্ট --}}
                                    <div class="col-md-8 d-flex align-items-start">
                                        <div class="me-3">
                                            <img src="https://i.pravatar.cc/40?img={{ $loop->index }}" 
                                                class="rounded-circle shadow-sm" width="45" height="45" alt="User Avatar">
                                        </div>
                                        <div>
                                            <strong>{{ $comment->user->name }}</strong>
                                            <small class="text-muted d-block mb-1">{{ $comment->created_at->diffForHumans() }}</small>
                                            <p class="mb-0">{{ $comment->comment }}</p>

                                            @if($comment->reply)
                                                <div class="ms-4 mt-3 p-2 border-start">
                                                    <strong>{{ $comment->reply->user->name }}</strong>
                                                    <small class="text-muted d-block mb-1">{{ $comment->reply->created_at->diffForHumans() }}</small>
                                                    <p class="mb-0">{{ $comment->reply->comment }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                                        @if($post->user_id == Auth::id() && is_null($comment->reply_id))
                                        <button class="btn btn-outline-info reply-btn" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#replyModal" 
                                                data-comment-id="{{ $comment->id }}">
                                            <i class="fas fa-reply"></i> Reply
                                        </button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="comment-form p-4 p-lg-5 fade-in-up">
                            <h5 class="fw-bold mb-4 text-gradient">Leave a Comment</h5>
                            <form action="{{ route('blog.comment.store', $post->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <textarea class="form-control" name="comment" id="comment" rows="4" placeholder="Share your thoughts..."></textarea>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary px-4 py-2">
                                    <i class="fas fa-paper-plane me-2"></i>Post Comment
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="replyModalLabel">Reply to Comment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="replyForm" action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="hidden" name="parent_id" id="parent_id">
                        <div class="mb-3">
                            <label for="replyComment" class="form-label">Your Reply</label>
                            <textarea class="form-control" name="comment" id="replyComment" rows="3" placeholder="Write your reply..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Post Reply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Simple JS for typing animation fallback/control if you don't use a library like Typed.js
        document.addEventListener('DOMContentLoaded', () => {
            const postTitle = document.querySelector('.post-title');
            if (postTitle) {
                // For a real typing effect, use a JS library or more complex script.
                setTimeout(() => {
                    postTitle.classList.add('show-full');
                }, 500); // Adjust delay as needed
            }

            // Optional: Basic Intersection Observer for fade-in elements
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1 // When 10% of the element is visible
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                        observer.unobserve(entry.target); // Stop observing once animated
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.fade-in-up').forEach(element => {
                observer.observe(element);
            });

            // JavaScript to handle the reply modal
            const replyModal = document.getElementById('replyModal');
            replyModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const commentId = button.getAttribute('data-comment-id');

                const replyForm = document.getElementById('replyForm');
                replyForm.action = "{{ route('blog.reply.store', ':commentId') }}".replace(':commentId', commentId);

                const parentIdInput = document.getElementById('parent_id');
                parentIdInput.value = commentId;
            });
        });
    </script>

@endsection