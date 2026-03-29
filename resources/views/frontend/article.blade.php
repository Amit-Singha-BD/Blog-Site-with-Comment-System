@extends('frontend.layout.master-layout')

@section('content')
    <header class="article-header">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <span class="badge bg-primary mb-3">{{ $article->category->categories_name }}</span>
                    <h1 class="display-4 fw-bold mb-4">{{ $article->title }}</h1>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="text-center">
                            <h2 class="mb-3">Author: {{ $article->user->name }}</h2>
                            <small class="text-white">
                                <i class="far fa-clock me-1"></i> Published: {{ $article->created_at }}
                            </small>
                            <small class="ms-3 badge bg-success">Status: {{ $article->status }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <article class="article-content container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <!-- Image -->
                <img src="{{ $article->image ? asset('uploads/articles/' . $article->image) : asset('storage/thumbnail.jpg') }}" alt="Blogging Image" class="img-fluid mb-4">

                <!-- Content -->
                <p class="lead">{{ $article->content }}</p>

                @php
                    $tags = explode(',', $article->tags);   // tags object to array convert
                @endphp
                <!-- Tags -->
                <div class="mb-4">
                    @foreach ($tags as $tag)
                        <span class="badge bg-secondary me-2">#{{ trim($tag) }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </article>
@endsection
