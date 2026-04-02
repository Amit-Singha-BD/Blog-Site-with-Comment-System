<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>{{ $title }}</title>
  <link href="{{asset('Assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('Assets/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{asset('Assets/css/AdminDashboard.css') }}">
</head>
<body>

  @if (session('success'))
    <div class="popup" id="successPopup">
        <div class="checkmark">✔</div>
        <h2>{{ session('success') }}</h2>
    </div>
  @endif

  @if (session('error'))
    <div class="popup" id="errorPopup">
        <div class="crossmark">✖</div>
        <h2>{{ session('error') }}</h2>
    </div>
  @endif

  <div class="sidebar-overlay" id="sidebarOverlay"></div>

  <div class="sidebar" id="sidebar">
    <div class="sidebar-brand">
      <span class="fs-4 fw-bold"><i class="fas fa-blog me-2"></i> Admin Panel</span>
    </div>

    <div class="sidebar-nav">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"
            data-bs-original-title="Dashboard">
            <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Route::is('admin.posts', 'admin.search', 'admin.filter') ? 'active' : '' }}"
            href="{{ route('admin.posts') }}" data-bs-original-title="All Posts">
            <i class="fas fa-file-alt"></i> <span>All Posts</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Route::is('article.view') ? 'active' : '' }}" href="{{ route('article.view') }}"
            data-bs-original-title="All Articles">
            <i class="fas fa-file-alt"></i> <span>All Articles</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Route::is('admin.rejected.list', 'admin.rejected.search') ? 'active' : '' }}"
            href="{{ route('admin.rejected.list') }}" data-bs-original-title="Rejected Posts">
            <i class="fa-solid fa-xmark"></i> <span>Rejected Posts</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Route::is('admin.posts.create') ? 'active' : '' }}"
            href="{{ route('admin.posts.create') }}" data-bs-original-title="Create New Post">
            <i class="fas fa-plus-circle"></i> <span>Add New Post</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Route::is('article.create.view') ? 'active' : '' }}"
            href="{{ route('article.create.view') }}" data-bs-original-title="Create New Article">
            <i class="fas fa-plus-circle"></i> <span>Add New Article</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Route::is('admin.user.posts', 'admin.users.posts.search') ? 'active' : '' }}"
            href="{{ route('admin.user.posts') }}" data-bs-original-title="Users Post Management">
            <i class="fas fa-newspaper"></i> <span>Manage User Posts</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Route::is('admin.categories') ? 'active' : '' }}" href="{{ route('admin.categories') }}"
            data-bs-original-title="Categories Management">
            <i class="fa-solid fa-tag"></i> <span>Manage Categories</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Route::is('admin.comments') ? 'active' : '' }}" href="{{ route('admin.comments') }}"
            data-bs-original-title="Comments Management">
            <i class="fas fa-comments"></i> <span>Manage Comments</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Route::is('admin.users', 'admin.users.search', 'admin.users.filter') ? 'active' : '' }}"
            href="{{ route('admin.users') }}" data-bs-original-title="Users Management">
            <i class="fas fa-users"></i> <span>Manage Users</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Route::is('admin.unread.contacts') ? 'active' : '' }}"
            href="{{ route('admin.unread.contacts') }}" data-bs-original-title="Users Management">
            <i class="fas fa-users"></i> <span>Manage Contact</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Route::is('admin.settings', 'admin.settings.edit') ? 'active' : '' }}"
            href="{{ route('admin.settings') }}" data-bs-original-title="Settings">
            <i class="fa-solid fa-screwdriver-wrench"></i> <span>Settings</span>
          </a>
        </li>
      </ul>
    </div>
  </div>


  <div class="main-content" id="mainContent">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <button id="mobileSidebarToggle" aria-label="Toggle mobile sidebar"><i class="fa-solid fa-bars"></i></button>
        <button id="desktopSidebarToggle" aria-label="Toggle desktop sidebar"><i class="fa-solid fa-chevron-left"></i></button>
        <a class="navbar-brand text-light" href="#"><i class="fas fa-blog me-2"></i>Admin Panel</a>

        <div class="ms-auto d-flex align-items-center">

          <div class="dropdown profile-dropdown">
            <a href="#" class="d-flex align-items-center dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="{{ asset('storage/' . (Auth::user()->image ?? 'user.png')) }}" alt="Profile" class="rounded-circle me-2">
              <span class="d-none d-lg-inline">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="fas fa-user me-2"></i> Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{ route('blog.home') }}"><i class="fa-solid fa-house-chimney me-2"></i> Home</a></li>
              <li>
                <form action="{{ route("logout")}}" method="post">
                  @csrf
                  <button class="dropdown-item">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                  </button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <div class="content-area">
      <div class="container-fluid">

        @yield('content')

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
    const navbar = document.querySelector('.navbar');

    function toggleMobileSidebar() {
      sidebar.classList.toggle('show');
      sidebarOverlay.classList.toggle('show');
      document.body.style.overflow = sidebar.classList.contains('show') ? 'hidden' : '';
    }

    function toggleDesktopSidebar() {
      sidebar.classList.toggle('collapsed');
      mainContent.classList.toggle('collapsed');
      navbar.classList.toggle('collapsed');

      const icon = desktopSidebarToggle.querySelector('i');
      icon.classList.toggle('fa-chevron-left');
      icon.classList.toggle('fa-chevron-right');

      localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
    }

    function initializeSidebar() {
      const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
      if (window.innerWidth >= 992) {
        if (isCollapsed) {
          sidebar.classList.add('collapsed');
          mainContent.classList.add('collapsed');
          navbar.classList.add('collapsed');
          desktopSidebarToggle.querySelector('i').classList.replace('fa-chevron-left', 'fa-chevron-right');
        } else {
          sidebar.classList.remove('collapsed');
          mainContent.classList.remove('collapsed');
          navbar.classList.remove('collapsed');
          desktopSidebarToggle.querySelector('i').classList.replace('fa-chevron-right', 'fa-chevron-left');
        }
        sidebar.classList.remove('show');
        sidebarOverlay.classList.remove('show');
        document.body.style.overflow = '';
      } else {
        sidebar.classList.remove('collapsed');
        mainContent.classList.remove('collapsed');
        navbar.classList.remove('collapsed');
        if (desktopSidebarToggle.querySelector('i').classList.contains('fa-chevron-right')) {
            desktopSidebarToggle.querySelector('i').classList.replace('fa-chevron-right', 'fa-chevron-left');
        }
      }
    }

    // Event Listeners
    mobileSidebarToggle.addEventListener('click', toggleMobileSidebar);
    desktopSidebarToggle.addEventListener('click', toggleDesktopSidebar);
    sidebarOverlay.addEventListener('click', toggleMobileSidebar);

    document.addEventListener('click', (event) => {
      if (window.innerWidth < 992 && sidebar.classList.contains('show')) {
        if (!sidebar.contains(event.target) && !mobileSidebarToggle.contains(event.target)) {
          toggleMobileSidebar();
        }
      }
    });

    window.addEventListener('resize', initializeSidebar);
    document.addEventListener('DOMContentLoaded', initializeSidebar);
  </script>
</body>
</html>