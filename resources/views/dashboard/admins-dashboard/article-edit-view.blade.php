@extends('dashboard/admins-dashboard/layout/master-layout')

@section('content')

    <div>
        <h6 class="text-uppercase text-end" style="color: #330867; font-size: 14px;">home / Create Article</h6>
    </div>

    <div class="container form-container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card top_border mb-4 shadow-sm">
                    <div class="card-header bg-white">
                        <h4 class="text-center gradient-text py-3">
                            <i class="fas fa-edit me-2"></i>Article Edit
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Featured Image (Old) -->
                            <div class="text-center mb-4">
                                @if ($article->image)
                                    <img src="{{ asset('uploads/articles/' . $article->image) }}" alt="Current Image"
                                        class="img-fluid rounded shadow-sm" style="max-height: 250px; object-fit: cover;">
                                @else
                                    <p class="text-muted">No previous image available</p>
                                @endif
                            </div>

                            <!-- Title -->
                            <div class="mb-4">
                                <label for="title" class="form-label">Article Title</label>
                                <input type="text" name="title" value="{{ $article->title }}" class="form-control form-control-lg" id="title"
                                    placeholder="Enter an engaging article title">
                                @error('title')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Category -->
                            <div class="mb-4">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-select" id="category_id" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $article->category_id ? 'selected' : '' }}>
                                            {{ $category->categories_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Slug -->
                            <div class="mb-4">
                                <label for="slug" class="form-label">Slug URL (Unique)</label>
                                <input type="text" name="slug" value="{{ $article->slug }}" class="form-control" id="slug"
                                    placeholder="auto-generated or enter-custom-slug">
                                @error('slug')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Image -->
                            <div class="mb-4">
                                <label class="form-label">Change Featured Image</label>
                                <div class="file-upload btn btn-light border d-inline-flex align-items-center mb-3">
                                    <i class="fas fa-image me-2"></i> <span>Upload New Image</span>
                                    <input type="file" name="image" id="featuredImage" accept="image/*">
                                </div>
                                @error('image')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    @foreach ($statusList as $status)
                                        <option value="{{ $status }}" {{ $status == $article->status ? 'selected' : '' }}>
                                            {{ ucfirst($status) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Published Date -->
                            <div class="mb-4">
                                <label for="published_at" class="form-label">Published Date & Time</label>
                                <input type="datetime-local" name="published_at"
                                    value="{{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('Y-m-d\TH:i') : '' }}"
                                    class="form-control" id="published_at">
                                @error('published_at')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Tags -->
                            <div class="mb-4">
                                <label for="tags" class="form-label">Tags (comma separated)</label>
                                <input type="text" name="tags" value="{{ $article->tags }}" class="form-control" id="tags"
                                    placeholder="Enter relevant tags (e.g. web development, laravel, php)">
                                @error('tags')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Content -->
                            <div class="mb-4">
                                <label for="content" class="form-label">Post Content</label>
                                <textarea name="content" class="form-control" id="content" rows="8"
                                    placeholder="Start writing your article content here...">{{ $article->content }}</textarea>
                                @error('content')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <div class="text-center mt-4">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-paper-plane me-1"></i> Update Article
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('featuredImage').addEventListener('change', function (e) {
            const preview = document.getElementById('imagePreview');
            const noImageText = document.getElementById('noImageText');

            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    preview.src = event.target.result;
                    preview.style.display = 'block';
                    noImageText.style.display = 'none';
                }
                reader.readAsDataURL(this.files[0]);
            } else {
                preview.style.display = 'none';
                noImageText.style.display = 'block';
            }
        });
    </script>

@endsection