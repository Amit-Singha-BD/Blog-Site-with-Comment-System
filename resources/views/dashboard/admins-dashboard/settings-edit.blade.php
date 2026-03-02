@extends('dashboard/admins-dashboard/layout/master-layout')

@section('content')

    <div>
        <h6 class="text-uppercase text-end" style="color: #330867; font-size: 14px;">home / {{ $title }}</h6>
    </div>

    <div class="container mt-4">
        <div class="card settings-card">
            <div class="card-body">
                <h3 class="card-title"><i class="fas fa-info-circle me-2"></i> Site Information</h3>
                <div class="row">
                    <div class="col-md-6 mb-4"> <form action="{{ route('admin.settings.name.update', $settings->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                            <label for="siteName" class="form-label">Site Name</label>
                            <input type="text" class="form-control" id="siteName" name="site_name" value="{{ $settings->site_name }}" placeholder="Your Site Name">
                            <button type="submit" name="submit" class="btn btn-primary mt-3">Save Site Name</button>
                        </form>
                    </div>

                    <div class="col-md-6 mb-4"> <form action="{{ route('admin.settings.tagline.update', $settings->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                            <label for="siteTagline" class="form-label">Site Tagline</label>
                            <input type="text" class="form-control" id="siteTagline" name="site_tagline" value="{{ $settings->site_tagline }}" placeholder="A short catchy phrase">
                            <button type="submit" name="submit" class="btn btn-primary mt-3">Save Site Tagline</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card settings-card">
            <div class="card-body">
                <h3 class="card-title"><i class="fas fa-image me-2"></i> Site Graphics</h3>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <label class="form-label">Site Logo</label>
                            <div class="file-upload">
                                <label for="logoUpload" class="file-upload-label">
                                    <i class="fas fa-upload"></i> Upload Logo
                                </label>
                                <input type="file" id="logoUpload" name="site_logo" class="file-upload-input" accept="image/*">
                            </div>
                            <img id="logoPreview" src="{{ asset('storage/'.$settings->logo_path) }}" class="preview-image" alt="Logo Preview">
                            <div class="form-text text-muted mt-2">Recommended size: 300x100px. Max file size: 2MB.</div>
                            <button type="submit" class="btn btn-primary mt-3">Save Logo</button>
                        </form>
                    </div>

                    <div class="col-md-6 mb-4">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <label class="form-label">Favicon</label>
                            <div class="file-upload">
                                <label for="faviconUpload" class="file-upload-label">
                                    <i class="fas fa-upload"></i> Upload Favicon
                                </label>
                                <input type="file" id="faviconUpload" name="site_favicon" class="file-upload-input" accept="image/*">
                            </div>
                            <img id="faviconPreview" src="{{ asset('storage/'.$settings->favicon_path) }}" class="preview-image" alt="Favicon Preview">
                            <div class="form-text text-muted mt-2">Recommended size: 32x32px or 64x64px. Max file size: 100KB.</div>
                            <button type="submit" class="btn btn-primary mt-3">Save Favicon</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card settings-card">
            <div class="card-body">
                <h3 class="card-title"><i class="fas fa-share-alt me-2"></i> Social Media Links</h3>
                <form action="{{ route('admin.settings.social.update', $settings->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label">Facebook URL</label>
                            <div class="input-group social-input-group">
                                <span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
                                <input type="text" class="form-control" name="facebook" placeholder="https://facebook.com/yourpage" value="{{ $settings->facebook_url }}">
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Twitter URL</label>
                            <div class="input-group social-input-group">
                                <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                <input type="text" class="form-control" name="twitter" placeholder="https://twitter.com/yourhandle" value="{{ $settings->twitter_url }}">
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Instagram URL</label>
                            <div class="input-group social-input-group">
                                <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                <input type="text" class="form-control" name="instagram" placeholder="https://instagram.com/yourprofile" value="{{ $settings->instagram_url }}">
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">LinkedIn URL</label>
                            <div class="input-group social-input-group">
                                <span class="input-group-text"><i class="fab fa-linkedin-in"></i></span>
                                <input type="text" class="form-control" name="linkedin" placeholder="https://linkedin.com/company/yourcompany" value="{{ $settings->linkedin_url }}">
                            </div>
                        </div>
                        <div class="col-12 mb-4"> <label class="form-label">YouTube URL</label>
                            <div class="input-group social-input-group">
                                <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                                <input type="text" class="form-control" name="youtube" placeholder="http://googleusercontent.com/youtube.com/4" value="{{ $settings->youtube_url }}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Save Social Links</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const logoUpload = document.getElementById('logoUpload');
            const logoPreview = document.getElementById('logoPreview');
            const faviconUpload = document.getElementById('faviconUpload');
            const faviconPreview = document.getElementById('faviconPreview');

            // Function to handle file preview
            function setupPreview(inputFile, previewImage) {
                if (inputFile && previewImage) {
                    inputFile.addEventListener('change', function(event) {
                        const [file] = event.target.files;
                        if (file) {
                            previewImage.src = URL.createObjectURL(file);
                            previewImage.style.display = 'block'; // Show the image if it was hidden
                        } else {
                            previewImage.src = ''; // Clear preview if no file selected
                            previewImage.style.display = 'none'; // Hide if no file
                        }
                    });

                    // Initial check: If there's already a src, ensure it's displayed
                    if (previewImage.src && previewImage.src !== window.location.href) { // Exclude cases where src is empty or current page URL
                        previewImage.style.display = 'block';
                    } else {
                        previewImage.style.display = 'none'; // Hide if no valid initial src
                    }
                }
            }

            setupPreview(logoUpload, logoPreview);
            setupPreview(faviconUpload, faviconPreview);
        });
    </script>

@endsection