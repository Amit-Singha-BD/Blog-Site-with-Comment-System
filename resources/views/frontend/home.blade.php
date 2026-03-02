@extends('frontend.layout.master-layout')

@section('content')

    <!-- ========== HERO SECTION ========== -->
    <section class="hero-header d-flex align-items-center">
        <div class="container text-center text-white">
            <h1 class="display-3 fw-bold mb-4">Share Your Thoughts</h1>
            <p class="lead mb-5">Here you can share your knowledge, experience, and creativity with the world. Be a part of our community.</p>
        </div>
    </section>

    <!-- ========== RECENT POSTS ========== -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold position-relative d-inline-block">
                    <span class="text-primary">Recent</span> Posts
                </h2>
                <p class="text-muted">Check out our latest blog posts</p>
            </div>

            <div class="row g-4">

                @foreach ($posts as $post)
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-card-new position-relative overflow-hidden rounded-4 shadow-lg bg-white h-100 d-flex flex-column">
                            <div class="blog-img-new position-relative">
                                <img src="{{ asset('storage/'.($post->image_path ?? 'thumbnail.jpg')) }}" alt="Post Image">
                                <div class="read-more-overlay d-flex align-items-center justify-content-center">
                                    <a href="{{ route('blog.post.show', $post->id) }}" class="btn btn-light fw-bold px-4 py-2 rounded-pill target-blank">Read More</a>
                                </div>
                            </div>
                            <div class="p-4 flex-grow-1 d-flex flex-column">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="badge rounded-pill bg-primary">{{ $post->category->categories_name }}</span>
                                    <small class="text-muted"><i class="far fa-clock me-1"></i>{{ $post->created_at->diffForHumans() }}</small>
                                </div>
                                <h5 class="fw-bold mb-2">{{ Str::limit($post->post_title, 30, '...') }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- ========== PAGINATION ========== -->
    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>

@endsection