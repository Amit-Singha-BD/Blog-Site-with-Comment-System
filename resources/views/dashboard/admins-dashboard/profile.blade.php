@extends('dashboard/admins-dashboard/layout/master-layout')

@section('content')

    <div class="container py-4">
        <div class="profile-container">
            <div class="profile-header">
                <a class="btn edit-btn" href="{{ route('profile.edit') }}">
                    <i class="fas fa-edit me-2"></i> Edit Profile
                </a>
                
                <img src="{{ asset('storage/' . (Auth::user()->image ?? 'user.png')) }}" alt="Profile Picture" class="profile-picture">
                <h1 class="profile-name">{{ Auth::user()->name }}</h1> <p class="profile-title">{{ Auth::user()->role }}</p> <div class="d-flex justify-content-center mt-3">
                </div>
            </div>
            
            <div class="profile-body py-4">
                <div class="container d-flex justify-content-center">
                    <div class="col-md-6">

                        <div class="profile-section mb-4 text-center">
                            <h3 class="section-title mb-3">
                                <i class="fas fa-user-circle me-2"></i> Personal Information
                            </h3>

                            <!-- Full Name -->
                            <div class="info-item mb-3 d-flex align-items-center">
                                <div class="info-icon me-3"><i class="fas fa-user"></i></div>
                                <div class="text-start">
                                    <div class="info-label fw-bold">Full Name</div>
                                    <div class="info-value">{{ Auth::user()->name }}</div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="info-item mb-3 d-flex align-items-center">
                                <div class="info-icon me-3"><i class="fas fa-envelope"></i></div>
                                <div class="text-start">
                                    <div class="info-label fw-bold">Email</div>
                                    <div class="info-value">{{ Auth::user()->email }}</div>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="info-item mb-3 d-flex align-items-center">
                                <div class="info-icon me-3"><i class="fas fa-phone"></i></div>
                                <div class="text-start">
                                    <div class="info-label fw-bold">Phone</div>
                                    <div class="info-value">{{ Auth::user()->phone }}</div>
                                </div>
                            </div>

                            <!-- Birth Date -->
                            <div class="info-item mb-3 d-flex align-items-center">
                                <div class="info-icon me-3"><i class="fas fa-birthday-cake"></i></div>
                                <div class="text-start">
                                    <div class="info-label fw-bold">Birth Date</div>
                                    <div class="info-value">January 15, 1990</div>
                                </div>
                            </div>

                            <!-- Gender -->
                            <div class="info-item mb-3 d-flex align-items-center">
                                <div class="info-icon me-3"><i class="fas fa-venus-mars"></i></div>
                                <div class="text-start">
                                    <div class="info-label fw-bold">Gender</div>
                                    <div class="info-value">{{ Auth::user()->gender }}</div>
                                </div>
                            </div>

                            <!-- Join Date -->
                            <div class="info-item mb-3 d-flex align-items-center">
                                <div class="info-icon me-3"><i class="fas fa-calendar-alt"></i></div>
                                <div class="text-start">
                                    <div class="info-label fw-bold">Join Date</div>
                                    <div class="info-value">{{ Auth::user()->created_at }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Statistics Section -->
                        <div class="profile-section text-center">
                            <h3 class="section-title mb-3">
                                <i class="fas fa-chart-line me-2"></i> Statistics
                            </h3>
                            <div class="stats-card p-3 border rounded shadow-sm">
                                <div class="stats-icon mb-2">
                                    <i class="fas fa-file-alt fa-2x"></i>
                                </div>
                                <div class="stats-number fs-3">{{ $postCount }}</div>
                                <div class="stats-label">Posts</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Statistics Card Animation
            const statsCards = document.querySelectorAll('.stats-card');
            statsCards.forEach((card, index) => {
                // Apply animation with a delay
                setTimeout(() => {
                    card.style.transform = 'translateY(0)';
                    card.style.opacity = '1';
                    card.style.transition = 'transform 0.5s ease-out, opacity 0.5s ease-out'; // Add transition property here
                }, index * 100); // Staggered animation
            });
        });
    </script>

@endsection