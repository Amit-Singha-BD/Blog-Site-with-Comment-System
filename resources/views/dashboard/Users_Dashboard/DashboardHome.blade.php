@extends('Dashboard/Admins_Dashboard/Layout/MasterLayout')

@section('Content')

    <h2 class="dashboard-heading">Dashboard</h2>
    <div class="row mb-4">
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase">Total Posts</h6>
                            <h3 class="mb-0">123</h3>
                        </div>
                        <div class="icon-wrapper icon-bg-warning">
                            <i class="fas fa-file-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase">Users Account</h6>
                            <h3 class="mb-0">45</h3>
                        </div>
                        <div class="icon-wrapper icon-bg-warning">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase">Total Views</h6>
                            <h3 class="mb-0">8956</h3>
                        </div>
                        <div class="icon-wrapper icon-bg-warning">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase">Pending Posts</h6>
                            <h3 class="mb-0">12</h3>
                        </div>
                        <div class="icon-wrapper icon-bg-warning">
                            <i class="fa-solid fa-hourglass-half"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase">Admin Account</h6>
                            <h3 class="mb-0">3</h3>
                        </div>
                        <div class="icon-wrapper icon-bg-warning">
                            <i class="fa-solid fa-user"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase">Categories</h6>
                            <h3 class="mb-0">8</h3>
                        </div>
                        <div class="icon-wrapper icon-bg-warning">
                            <i class="fa-solid fa-tag"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase">Comments</h6>
                            <h3 class="mb-0">8956</h3>
                        </div>
                        <div class="icon-wrapper icon-bg-warning">
                            <i class="fa-regular fa-comment-dots"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase">Rejected Posts</h6>
                            <h3 class="mb-0">4</h3>
                        </div>
                        <div class="icon-wrapper icon-bg-warning">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="summary-section">
        <h5>Summary</h5>
        <p>This dashboard helps you monitor your content, comments, users, and more in one place. Use the left sidebar to navigate to specific areas like creating a new post, managing categories, or reviewing comments. Make sure to regularly check the stats to stay updated with your site's performance.</p>
    </div>

@endsection