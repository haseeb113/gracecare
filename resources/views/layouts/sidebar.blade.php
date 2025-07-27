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
        @if(auth()->user()->role == 'admin')
<li class="nav-item">
  <a href="{{ route('doctors.index') }}" class="nav-link">
    <i class="nav-icon fas fa-user-md"></i>
    <p>Doctors</p>
  </a>
</li>
@endif
@if(in_array(auth()->user()->role, ['admin', 'receptionist']))
<li class="nav-item">
  <a href="{{ route('patients.index') }}" class="nav-link">
    <i class="nav-icon fas fa-user-injured"></i>
    <p>Patients</p>
  </a>
</li>
@endif

@if(in_array(auth()->user()->role,['receptionist','doctor']))
<li class="nav-item">
  <a href="{{ route('appointments.index') }}" class="nav-link">
    <i class="nav-icon fas fa-calendar-alt"></i>
    <p>Appointments</p>
  </a>
</li>
@endif
@if(auth()->user()->role === 'doctor')
<li class="nav-item">
  <a href="{{ route('prescriptions.index') }}" class="nav-link">
    <i class="nav-icon fas fa-prescription-bottle"></i>
    <p>Prescriptions</p>
  </a>
</li>
@endif

@if(in_array(auth()->user()->role,['admin','receptionist']))
<li class="nav-item">
  <a href="{{ route('invoices.index') }}" class="nav-link">
    <i class="nav-icon fas fa-file-invoice-dollar"></i>
    <p>Billing</p>
  </a>
</li>
@endif

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
