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
                    <div class="col-md-6 mb-3 settings-info-item">
                        <p class="mb-1"><strong>Site Name:</strong></p>
                        <p>{{ $settings->site_name }}</p> </div>
                    <div class="col-md-6 mb-3 settings-info-item">
                        <p class="mb-1"><strong>Site Tagline:</strong></p>
                        <p>{{ $settings->site_tagline }}</p> </div>
                </div>
            </div>
        </div>

        <div class="card settings-card">
            <div class="card-body">
                <h3 class="card-title"><i class="fas fa-image me-2"></i> Site Graphics</h3>
                <div class="row">
                    <div class="col-md-6 mb-3 settings-info-item text-center">
                        <p class="mb-1"><strong>Site Logo:</strong></p>
                        <img src="{{ asset('storage/'.$settings->logo_path) }}" class="img-thumbnail preview-image" alt="Site Logo">
                        <small class="text-muted d-block mt-2">Recommended size: 300x100px</small>
                    </div>
                    <div class="col-md-6 mb-3 settings-info-item text-center">
                        <p class="mb-1"><strong>Favicon:</strong></p>
                        <img src="{{ asset('storage/'.$settings->favicon_path) }}" class="img-thumbnail preview-image" alt="Favicon">
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
                        <p><a href="{{ $settings->facebook_url }}" target="_blank">{{ $settings->facebook_url }}</a></p>
                    </div>
                    <div class="col-md-12 mb-3 settings-info-item">
                        <p class="mb-1"><strong>Twitter:</strong></p>
                        <p><a href="{{ $settings->twitter_url }}" target="_blank">{{ $settings->twitter_url }}</a></p>
                    </div>
                    <div class="col-md-12 mb-3 settings-info-item">
                        <p class="mb-1"><strong>Instagram:</strong></p>
                        <p><a href="{{ $settings->instagram_url }}" target="_blank">{{ $settings->instagram_url }}</a></p>
                    </div>
                    <div class="col-md-12 mb-3 settings-info-item">
                        <p class="mb-1"><strong>LinkedIn:</strong></p>
                        <p><a href="{{ $settings->linkedin_url }}" target="_blank">{{ $settings->linkedin_url }}</a></p>
                    </div>
                    <div class="col-md-12 mb-3 settings-info-item">
                        <p class="mb-1"><strong>YouTube:</strong></p>
                        <p><a href="{{ $settings->youtube_url }}" target="_blank">{{ $settings->youtube_url }}</a></p>
                    </div>
                </div>
                <div class="settings-edit-button">
                    <a class="btn btn-primary" href="{{ route('admin.settings.edit') }}">
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