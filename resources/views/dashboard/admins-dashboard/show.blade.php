@extends('dashboard/admins-dashboard/layout/master-layout')

@section('content')

    <div class="container py-5">
        <div class="card post-card">
            <img src="{{ asset('storage/'.$post->image_path) }}" class="post-image" alt="Post Image" />
            
            <div class="p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <span class="badge badge-category">{{ $post->categories_id }}</span> <span class="badge bg-success">{{ $post->status}}</span> </div>

                <h1 class="post-title mb-3">{{ $post->post_title }}</h1> <div class="meta-info mb-4">
                    <i class="fa-regular fa-calendar icon"></i> Posted on: <strong>{{ $post->created_at }}</strong> </div>
                
                <hr />
                
                <div class="post-content mb-5">
                    <p>{{ $post->description }}</p>
                </div>
                
                <div class="d-flex justify-content-center flex-wrap gap-3">
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary btn-rounded">
                        <i class="fas fa-edit icon"></i>Edit Post
                    </a>
                    </div>
            </div>
        </div>
    </div>

@endsection