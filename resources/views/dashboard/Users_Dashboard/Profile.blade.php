@extends('Dashboard/Admins_Dashboard/Layout/MasterLayout')

@section('Content')

    <div class="container py-4">
        <div class="profile-container">
            <div class="profile-header">
                <button class="btn edit-btn">
                    <i class="fas fa-edit me-2"></i> Edit Profile
                </button>
                
                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Profile Picture" class="profile-picture">
                <h1 class="profile-name">John Doe</h1> <p class="profile-title">Admin | Content Creator</p> <div class="d-flex justify-content-center mt-3">
                    <a href="https://facebook.com/johndoe" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/johndoe" target="_blank" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="https://linkedin.com/in/johndoe" target="_blank" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://github.com/johndoe" target="_blank" class="social-icon"><i class="fab fa-github"></i></a>
                </div>
            </div>
            
            <div class="profile-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="profile-section">
                            <h3 class="section-title">
                                <i class="fas fa-user-circle me-2"></i> Personal Information
                            </h3>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="info-content">
                                            <div class="info-label">Full Name</div>
                                            <div class="info-value">John Doe</div>
                                        </div>
                                    </div>
                                    
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="info-content">
                                            <div class="info-label">Email</div>
                                            <div class="info-value">john@example.com</div>
                                        </div>
                                    </div>
                                    
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div class="info-content">
                                            <div class="info-label">Phone</div>
                                            <div class="info-value">+1234567890</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-birthday-cake"></i>
                                        </div>
                                        <div class="info-content">
                                            <div class="info-label">Birth Date</div>
                                            <div class="info-value">January 15, 1990</div>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="info-content">
                                            <div class="info-label">Location</div>
                                            <div class="info-value">New York, USA</div>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                        <div class="info-content">
                                            <div class="info-label">Join Date</div>
                                            <div class="info-value">2021-01-01</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="profile-section">
                            <h3 class="section-title">
                                <i class="fas fa-chart-line me-2"></i> Statistics
                            </h3>

                            <div class="stats-card">
                                <div class="stats-icon">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div class="stats-number">142</div>
                                <div class="stats-label">Posts</div>
                            </div>

                            <div class="stats-card">
                                <div class="stats-icon">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <div class="stats-number">1.2M</div>
                                <div class="stats-label">Views</div>
                            </div>

                            <div class="stats-card">
                                <div class="stats-icon">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="stats-number">4.8</div>
                                <div class="stats-label">Rating</div>
                            </div>

                            <div class="stats-card">
                                <div class="stats-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="stats-number">28</div>
                                <div class="stats-label">Following</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Edit Profile Button Alert
            const editButton = document.querySelector('.profile-header .edit-btn');
            if (editButton) {
                editButton.addEventListener('click', function() {
                    alert('Edit profile functionality would open a modal or redirect to an edit page for the user.');
                });
            }

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