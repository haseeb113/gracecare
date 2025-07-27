<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'GraceCare')</title>

  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

@if(auth()->check())
    @include('layouts.header')
@endif

  @if(auth()->check())
    @include('layouts.sidebar')
@endif


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content pt-3">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>
  </div>

  @include('layouts.footer')

</div>

<!-- AdminLTE Scripts -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

@stack('scripts')
</body>
</html>
