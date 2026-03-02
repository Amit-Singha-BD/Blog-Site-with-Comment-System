@extends('Dashboard/Admins_Dashboard/Layout/MasterLayout')

@section('Content')

    <div class="container form-container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card top_border mb-4">
                    <div class="card-header bg-white">
                        <h4 class="text-center gradient-text py-3">
                            <i class="fas fa-plus-circle me-2"></i>Create New Post
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label for="postTitle" class="form-label">Post Title</label>
                                <input type="text" name="title" class="form-control form-control-lg" id="postTitle" placeholder="Enter post title">
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label">Featured Image</label>
                                <div class="file-upload btn btn-light border d-inline-flex align-items-center mb-3">
                                    <i class="fas fa-image me-2"></i> <span>Upload Image</span>
                                    <input type="file" name="image" id="featuredImage" accept="image/*">
                                </div>
                                <div class="d-flex align-items-center">
                                    <img id="imagePreview" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="preview-image" style="display: none;">
                                    <div id="noImageText" class="text-muted">No image selected</div>
                                </div>
                                <div class="form-text mt-2">Recommended size: 1200x630 pixels. (Will be cropped)</div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="postCategory" class="form-label">Category</label>
                                <select class="form-select" id="postCategory" name="category">
                                    <option selected disabled>Select category</option>
                                    <option value="1">Example Category 1</option>
                                    <option value="2">Example Category 2</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option selected disabled>Select Status</option>
                                    <option>Published</option>
                                    <option>Pending</option>
                                    <option>Draft</option>
                                </select>
                            </div>
                            
                            <div class="mb-4">
                                <label for="postSlug" class="form-label">Slug URL (Unique)</label>
                                <input type="text" name="slug" class="form-control" id="postSlug" placeholder="Add Slug Url">
                            </div>

                            <div class="mb-4">
                                <label for="postContent" class="form-label">Post Content</label>
                                <textarea name="content" class="form-control" id="postContent" rows="10" placeholder="Write your post content here..."></textarea>
                            </div>
                            
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <label class="form-label">SEO Settings</label>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#seoCollapse" aria-expanded="false" aria-controls="seoCollapse">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                                <div class="collapse" id="seoCollapse">
                                    <div class="card card-body mb-3">
                                        <div class="mb-3">
                                            <label for="metaTitle" class="form-label">Meta Title</label>
                                            <input type="text" class="form-control" id="metaTitle" placeholder="Meta title for SEO">
                                            <div class="form-text">Optimize for search engines (up to 60 characters)</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="metaDescription" class="form-label">Meta Description</label>
                                            <textarea class="form-control" id="metaDescription" rows="3" placeholder="Meta description for SEO"></textarea>
                                            <div class="form-text">Concise summary of content (up to 160 characters)</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="seoSlug" class="form-label">SEO Friendly URL Slug</label>
                                            <input type="text" class="form-control" id="seoSlug" placeholder="custom-url-slug-for-seo">
                                            <div class="form-text">Use keywords, separate with hyphens</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex flex-wrap justify-content-between align-items-center mt-4">
                                <div class="mb-3 me-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="publishNow" checked>
                                        <label class="form-check-label" for="publishNow">Publish Immediately</label>
                                    </div>
                                </div>
                                <div class="mb-3 d-flex flex-grow-1 justify-content-end">
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        <i class="fas fa-paper-plane me-1"></i> Update Post
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('featuredImage').addEventListener('change', function(e) {
            const preview = document.getElementById('imagePreview');
            const noImageText = document.getElementById('noImageText');
            
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(event) {
                    preview.src = event.target.result;
                    preview.style.display = 'block';
                    noImageText.style.display = 'none';
                }
                
                reader.readAsDataURL(this.files[0]);
            } else {
                preview.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"; // Reset to blank GIF
                preview.style.display = 'none';
                noImageText.style.display = 'block';
            }
        });
    </script>

@endsection