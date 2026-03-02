@extends('dashboard/admins-dashboard/layout/master-layout')

@section('content')

    <div>
        <h6 class="text-uppercase text-end" style="color: #330867; font-size: 14px;">home / {{ $title }}</h6>
    </div>

    <div class="container form-container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card top_border mb-4 shadow-sm">
                    <div class="card-header bg-white">
                        <h4 class="text-center gradient-text py-3">
                            <i class="fas fa-plus-circle me-2"></i>Create New Article
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Title -->
                            <div class="mb-4">
                                <label for="title" class="form-label">Article Title</label>
                                <input type="text" name="title" class="form-control form-control-lg" id="title"
                                    placeholder="Enter an engaging article title" value="{{ old('title') }}">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Category -->
                            <div class="mb-4">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-select" id="category_id" name="category_id">
                                    <option selected disabled>Select a category for this article</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->categories_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Slug -->
                            <div class="mb-4">
                                <label for="slug" class="form-label">Slug URL (Unique)</label>
                                <input type="text" name="slug" class="form-control" id="slug" placeholder="auto-generated or enter-custom-slug"
                                    value="{{ old('slug') }}">
                                @error('slug')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Image -->
                            <div class="mb-4">
                                <label class="form-label">Featured Image</label>
                                <div class="file-upload btn btn-light border d-inline-flex align-items-center mb-3">
                                    <i class="fas fa-image me-2"></i> <span>Upload Image</span>
                                    <input type="file" name="image" id="featuredImage" accept="image/*">
                                </div>
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Published At -->
                            <div class="mb-4">
                                <label for="published_at" class="form-label">Publish Date & Time</label>
                                <input type="datetime-local" name="published_at" id="published_at" class="form-control"
                                    value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}">
                                @error('published_at')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                </select>
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Tags -->
                            <div class="mb-4">
                                <label for="tags" class="form-label">Tags (comma separated)</label>
                                <input type="text" name="tags" class="form-control" id="tags"
                                    placeholder="Enter relevant tags (e.g. web development, laravel, php)" value="{{ old('tags') }}">
                                @error('tags')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Content -->
                            <div class="mb-4">
                                <label for="content" class="form-label">Post Content</label>
                                <textarea name="content" class="form-control" id="content" rows="8"
                                    placeholder="Start writing your article content here...">{{ old('content') }}</textarea>
                                @error('content')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <div class="text-center mt-4">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-paper-plane me-1"></i> Publish Article
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