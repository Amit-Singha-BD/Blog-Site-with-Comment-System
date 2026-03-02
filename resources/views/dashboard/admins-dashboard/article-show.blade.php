@extends('dashboard/admins-dashboard/layout/master-layout')

@section('content')

    <div class="container py-5">
        <div class="card post-card">
            @if($article->image)
                <img src="{{ asset('uploads/articles/' . $article->image) }}" class="post-image img-fluid w-100"
                    style="height: auto; max-height: 600px; object-fit: cover;" alt="Article Image" />
            @endif

            <div class="p-4">
                <!-- Category, Tags & Status in one line -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- Category -->
                    <span class="badge badge-category">{{ $article->category->categories_name ?? 'N/A' }}</span>

                    <!-- Tags -->
                    <div class="flex-grow-1 text-center">
                        @if($article->tags)
                            @foreach(explode(',', $article->tags) as $tag)
                                <span class="badge bg-secondary">{{ trim($tag) }}</span>
                            @endforeach
                        @endif
                    </div>

                    <!-- Status -->
                    <span class="badge bg-success">{{ ucfirst($article->status) }}</span>
                </div>

                <!-- Title -->
                <h1 class="post-title mb-2">{{ $article->title }}</h1>

                <!-- Author & Published Date -->
                <div class="meta-info mb-4">
                    <i class="fa-regular fa-user icon"></i> Author: <strong>{{ $article->user->name ?? 'N/A' }}</strong>
                    &nbsp; | &nbsp;
                    <i class="fa-regular fa-calendar icon"></i> Published on:
                    <strong>{{ $article->published_at ?? $article->created_at }}</strong>
                </div>

                <hr />

                <!-- Content -->
                <div class="post-content mb-5">
                    <p>{!! nl2br(e($article->content)) !!}</p>
                </div>

                <!-- Edit Button -->
                <div class="d-flex justify-content-center flex-wrap gap-3">
                    <a href="{{ route('article.edit.view', $article->id) }}" class="btn btn-primary btn-rounded">
                        <i class="fas fa-edit icon"></i> Edit Article
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection