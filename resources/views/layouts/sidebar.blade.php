<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('/') }}" class="brand-link">
    <span class="brand-text font-weight-light">GraceCare</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
    <a class="nav-link text-danger" href="{{ route('logout') }}"
       onclick="return confirm('Are you sure you want to logout?')">
       <i class="nav-icon fas fa-sign-out-alt"></i> Logout
    </a>
</li>

        {{-- More menu items here --}}
      </ul>
    </nav>
  </div>
</aside>
