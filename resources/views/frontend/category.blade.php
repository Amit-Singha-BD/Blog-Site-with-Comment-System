@extends('frontend.layout.master-layout')

@section('content')

    <section class="category-header">
        <div class="container text-center text-white">
            <h1 class="display-3 fw-bold mb-4">Explore Our Categories</h1>
            <p class="lead mb-5">Discover posts on various topics that interest you.</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold position-relative d-inline-block">
                    <span class="text-primary">Blog</span> Categories
                </h2>
                <p class="text-muted">Dive into topics that matter most</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="category-card">
                        <div class="icon-wrapper">
                            <i class="fas fa-microchip"></i>
                        </div>
                        <h3>Technology</h3>
                        <p>Explore the latest in gadgets, software, AI, and digital innovations.</p>
                        <a href="{{ route('blog.technology') }}" class="btn btn-view-posts">View Posts</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="category-card">
                        <div class="icon-wrapper">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h3>Health</h3>
                        <p>Tips for a healthier lifestyle, fitness routines, nutrition, and well-being.</p>
                        <a href="{{ route('blog.health') }}" class="btn btn-view-posts">View Posts</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="category-card">
                        <div class="icon-wrapper">
                            <i class="fas fa-plane-departure"></i>
                        </div>
                        <h3>Travel</h3>
                        <p>Discover new destinations, travel guides, adventure stories, and tips.</p>
                        <a href="{{ route('blog.travel') }}" class="btn btn-view-posts">View Posts</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="category-card">
                        <div class="icon-wrapper">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3>Education</h3>
                        <p>Articles on learning, skill development, career advice, and academic insights.</p>
                        <a href="{{ route('blog.education') }}" class="btn btn-view-posts">View Posts</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="category-card">
                        <div class="icon-wrapper">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h3>Business</h3>
                        <p>Latest business news, strategies, market insights, and entrepreneurship tips.</p>
                        <a href="{{ route('blog.busness') }}" class="btn btn-view-posts">View Posts</a>
                    </div>
                </div>

                </div>
        </div>
    </section>

@endsection