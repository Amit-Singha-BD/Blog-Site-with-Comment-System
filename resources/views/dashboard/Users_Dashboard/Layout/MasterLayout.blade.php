<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard - Blog Admin</title>
  <link href="{{asset('Assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('Assets/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{asset('Assets/css/AdminDashboard.css') }}">
</head>
<body>

  <div class="sidebar-overlay" id="sidebarOverlay"></div>
  
  <div class="sidebar" id="sidebar">
    <div class="sidebar-brand">
      <span class="fs-4 fw-bold"><i class="fas fa-blog me-2"></i> Blog Admin</span>
    </div>
    <div class="sidebar-nav">
      <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link active" href="{{ route('dashboard') }}" data-bs-original-title="Dashboard"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('blogPost') }}" data-bs-original-title="All Posts"><i class="fas fa-file-alt"></i> <span>All Posts</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('rejectedPost') }}" data-bs-original-title="Rejected Posts"><i class="fa-solid fa-xmark"></i> <span>Rejected Posts</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('createPost')}}" data-bs-original-title="Create New Post"><i class="fas fa-plus-circle"></i> <span>Create New Post</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('userPost') }}" data-bs-original-title="Users Post Management"><i class="fas fa-newspaper"></i> <span>Users Post Management</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('categories') }}" data-bs-original-title="Categories Management"><i class="fa-solid fa-tag"></i> <span>Categories Management</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('comments') }}" data-bs-original-title="Comments Management"><i class="fas fa-comments"></i> <span>Comments Management</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('userManagement')}}" data-bs-original-title="Users Management"><i class="fas fa-users"></i> <span>Users Management</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('settings') }}" data-bs-original-title="Settings"><i class="fa-solid fa-screwdriver-wrench"></i> <span>Settings</span></a></li>
      </ul>
    </div>
  </div>

  <div class="main-content" id="mainContent">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <button id="mobileSidebarToggle" aria-label="Toggle mobile sidebar"><i class="fa-solid fa-bars"></i></button>
        <button id="desktopSidebarToggle" aria-label="Toggle desktop sidebar"><i class="fa-solid fa-chevron-left"></i></button>
        <a class="navbar-brand text-light" href="#"><i class="fas fa-blog me-2"></i>Blog Admin</a>

        <div class="ms-auto d-flex align-items-center">
          <div class="dropdown me-3">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-regular fa-bell"></i>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><h6 class="dropdown-header">Notifications</h6></li>
              <li><a class="dropdown-item" href="#">New order received</a></li>
              <li><a class="dropdown-item" href="#">System update available</a></li>
              <li><a class="dropdown-item" href="#">New user registered</a></li>
            </ul>
          </div>

          <div class="dropdown profile-dropdown">
            <a href="#" class="d-flex align-items-center dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Profile" class="rounded-circle me-2">
              <span class="d-none d-lg-inline">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="fas fa-user me-2"></i> Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <div class="content-area">
      <div class="container-fluid">

        @yield('Content')

      </div>
    </div>
  </div>

  <script src="{{asset('Assets/js/bootstrap.bundle.min.js') }}"></script>

  <script>
    // General popup dismiss (if you have success/error messages)
    setTimeout(() => {
      const popup = document.getElementById('successPopup');
      if (popup) popup.style.display = 'none';
    }, 3000);

    setTimeout(() => {
      const popup = document.getElementById('errorPopup');
      if (popup) popup.style.display = 'none';
    }, 3000);

    // Sidebar and Layout Toggling Logic
    const mobileSidebarToggle = document.getElementById('mobileSidebarToggle');
    const desktopSidebarToggle = document.getElementById('desktopSidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const mainContent = document.getElementById('mainContent');
    const navbar = document.querySelector('.navbar'); // Targeting the navbar to adjust its width/position

    function toggleMobileSidebar() {
      sidebar.classList.toggle('show');
      sidebarOverlay.classList.toggle('show');
      document.body.style.overflow = sidebar.classList.contains('show') ? 'hidden' : ''; // Prevent body scroll
    }

    function toggleDesktopSidebar() {
      sidebar.classList.toggle('collapsed');
      mainContent.classList.toggle('collapsed');
      // The navbar should also react to the sidebar collapse
      navbar.classList.toggle('collapsed');

      const icon = desktopSidebarToggle.querySelector('i');
      icon.classList.toggle('fa-chevron-left');
      icon.classList.toggle('fa-chevron-right');

      // Save preference to localStorage
      localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
    }

    function initializeSidebar() {
      const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
      if (window.innerWidth >= 992) { // Desktop view
        if (isCollapsed) {
          sidebar.classList.add('collapsed');
          mainContent.classList.add('collapsed');
          navbar.classList.add('collapsed');
          desktopSidebarToggle.querySelector('i').classList.replace('fa-chevron-left', 'fa-chevron-right');
        } else {
          // Ensure classes are removed if not collapsed on desktop
          sidebar.classList.remove('collapsed');
          mainContent.classList.remove('collapsed');
          navbar.classList.remove('collapsed');
          desktopSidebarToggle.querySelector('i').classList.replace('fa-chevron-right', 'fa-chevron-left');
        }
        // Ensure mobile-specific classes are off
        sidebar.classList.remove('show');
        sidebarOverlay.classList.remove('show');
        document.body.style.overflow = '';
      } else { // Mobile view
        // Ensure desktop-specific classes are off
        sidebar.classList.remove('collapsed');
        mainContent.classList.remove('collapsed');
        navbar.classList.remove('collapsed');
        // Hide desktop toggle if it somehow appeared
        if (desktopSidebarToggle.querySelector('i').classList.contains('fa-chevron-right')) {
            desktopSidebarToggle.querySelector('i').classList.replace('fa-chevron-right', 'fa-chevron-left');
        }
      }
    }

    // Event Listeners
    mobileSidebarToggle.addEventListener('click', toggleMobileSidebar);
    desktopSidebarToggle.addEventListener('click', toggleDesktopSidebar);
    sidebarOverlay.addEventListener('click', toggleMobileSidebar);

    // Close mobile sidebar if clicking outside
    document.addEventListener('click', (event) => {
      if (window.innerWidth < 992 && sidebar.classList.contains('show')) {
        // Check if the click is outside the sidebar and not on the toggle button
        if (!sidebar.contains(event.target) && !mobileSidebarToggle.contains(event.target)) {
          toggleMobileSidebar();
        }
      }
    });

    // Re-initialize sidebar on window resize
    window.addEventListener('resize', initializeSidebar);

    // Initialize sidebar on page load
    document.addEventListener('DOMContentLoaded', initializeSidebar);
  </script>
</body>
</html>