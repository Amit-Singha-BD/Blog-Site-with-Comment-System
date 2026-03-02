<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta & Title -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Blog</title>

    <!-- Stylesheets -->
    <link href="{{asset('Assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('Assets/fontawesome/css/all.min.css')}}"/>
    <link href="{{asset('Assets/css/FrontendStyle.css')}} " rel="stylesheet">
</head>
<body>

    <!-- ========== NAVBAR ========== -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-3 sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">My Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Navigation Links -->
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('blog.home') ? 'active' : '' }}" href="{{ route('blog.home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('blog.categories') || 
                                                               request()->routeIs('blog.technology') ||
                                                               request()->routeIs('blog.health') ||
                                                               request()->routeIs('blog.travel') ||
                                                               request()->routeIs('blog.education') ||
                                                               request()->routeIs('blog.busness') ? 'active' : '' }}" href="{{ route('blog.categories') }}">Category</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('blog.article') ? 'active' : '' }}" href="{{ route('blog.article') }}">Articles</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('blog.about') ? 'active' : '' }}" href="{{ route('blog.about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('blog.contact') ? 'active' : '' }}" href="{{ route('blog.contact') }}">Contact</a></li>
                </ul>
                <!-- Right Buttons -->
                <div class="d-flex">
                    @if (Auth::check())
                        <a class="btn btn-login" href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-gauge-high me-1"></i> Deshboard</a>
                        @else
                            <a class="btn btn-login" href="{{ route('login') }}"><i class="fas fa-sign-in-alt me-1"></i> Log In</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- ========== FOOTER ========== -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <!-- Column 1 -->
                <div class="col-lg-3 col-md-6">
                    <h3>My Blog</h3>
                    <p>A platform for sharing knowledge, information, and inspiration.</p>
                    <div class="d-flex gap-3 mt-4">
                        <a href="#" class="social-icon text-light"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="social-icon text-light"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon text-light"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon text-light"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <!-- Column 2: Links -->
                <div class="col-lg-3 col-md-6">
                    <h3>Links</h3>
                    <ul class="footer-links ps-0">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Articles</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <!-- Column 3: Categories -->
                <div class="col-lg-3 col-md-6">
                    <h3>Categories</h3>
                    <ul class="footer-links ps-0">
                        <li><a href="#">Technology</a></li>
                        <li><a href="#">Health</a></li>
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Education</a></li>
                        <li><a href="#">Business</a></li>
                    </ul>
                </div>
                <!-- Column 4: Contact -->
                <div class="col-lg-3 col-md-6">
                    <h3>Contact</h3>
                    <p><i class="fas fa-map-marker-alt me-2"></i> Dhaka, Bangladesh</p>
                    <p><i class="fas fa-envelope me-2"></i> contact@amarblog.com</p>
                    <p><i class="fas fa-phone me-2"></i> +880 1XXX XXXXXX</p>
                </div>
            </div>
            <!-- Footer Bottom -->
            <div class="text-center pt-4 mt-4 border-top border-light">
                <p class="mb-0">&copy; 2023 My Blog. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- ========== SCRIPTS ========== -->
    <script src="{{asset('Assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>