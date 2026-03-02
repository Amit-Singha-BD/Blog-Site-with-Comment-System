@extends('Dashboard/Admins_Dashboard/Layout/MasterLayout')

@section('Content')

    <div class="container">
        <div class="card settings-card">
            <div class="card-body">
                <h3 class="card-title"><i class="fas fa-info-circle me-2"></i> Site Information</h3>
                <div class="row">
                    <div class="col-md-6 mb-3 settings-info-item">
                        <p class="mb-1"><strong>Site Name:</strong></p>
                        <p>My Awesome Blog</p> </div>
                    <div class="col-md-6 mb-3 settings-info-item">
                        <p class="mb-1"><strong>Site Tagline:</strong></p>
                        <p>Where Ideas Blossom!</p> </div>
                </div>
            </div>
        </div>

        <div class="card settings-card">
            <div class="card-body">
                <h3 class="card-title"><i class="fas fa-image me-2"></i> Site Graphics</h3>
                <div class="row">
                    <div class="col-md-6 mb-3 settings-info-item text-center">
                        <p class="mb-1"><strong>Site Logo:</strong></p>
                        <img src="https://via.placeholder.com/150x50/6c5ce7/ffffff?text=Your+Logo" class="img-thumbnail preview-image" alt="Site Logo">
                        <small class="text-muted d-block mt-2">Recommended size: 300x100px</small>
                    </div>
                    <div class="col-md-6 mb-3 settings-info-item text-center">
                        <p class="mb-1"><strong>Favicon:</strong></p>
                        <img src="https://via.placeholder.com/50/20c997/ffffff?text=F" class="img-thumbnail preview-image" alt="Favicon">
                        <small class="text-muted d-block mt-2">Recommended size: 32x32px or 64x64px</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="card settings-card">
            <div class="card-body">
                <h3 class="card-title"><i class="fas fa-share-alt me-2"></i> Social Media Links</h3>
                <div class="row">
                    <div class="col-md-12 mb-3 settings-info-item">
                        <p class="mb-1"><strong>Facebook:</strong></p>
                        <p><a href="https://facebook.com/example" target="_blank">facebook.com/example</a></p>
                    </div>
                    <div class="col-md-12 mb-3 settings-info-item">
                        <p class="mb-1"><strong>Twitter:</strong></p>
                        <p><a href="https://twitter.com/example" target="_blank">twitter.com/example</a></p>
                    </div>
                    <div class="col-md-12 mb-3 settings-info-item">
                        <p class="mb-1"><strong>Instagram:</strong></p>
                        <p><a href="https://instagram.com/example" target="_blank">instagram.com/example</a></p>
                    </div>
                    <div class="col-md-12 mb-3 settings-info-item">
                        <p class="mb-1"><strong>LinkedIn:</strong></p>
                        <p><a href="https://linkedin.com/in/example" target="_blank">linkedin.com/in/example</a></p>
                    </div>
                    <div class="col-md-12 mb-3 settings-info-item">
                        <p class="mb-1"><strong>YouTube:</strong></p>
                        <p><a href="https://youtube.com/user/example" target="_blank">youtube.com/user/example</a></p>
                    </div>
                </div>
                <div class="settings-edit-button">
                    <a class="btn btn-primary" href="{{ route('settingsEdit') }}">
                        <i class="fas fa-edit me-2"></i> Edit All Settings
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to handle file input change and update preview
            function handleFileSelect(event) {
                const file = event.target.files[0];
                const previewId = event.target.id === 'siteLogo' ? 'siteLogoPreview' : 'faviconPreview';
                const previewImage = document.getElementById(previewId);

                if (file && previewImage) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }

            // Attach event listeners to file inputs
            const siteLogoInput = document.getElementById('siteLogo');
            const faviconInput = document.getElementById('favicon');

            if (siteLogoInput) {
                siteLogoInput.addEventListener('change', handleFileSelect);
            }
            if (faviconInput) {
                faviconInput.addEventListener('change', handleFileSelect);
            }
        });
    </script>

@endsection