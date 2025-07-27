@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<div class="login-box mx-auto mt-5">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Grace</b>Care</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif

      <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </form>

      <p class="mt-3 text-center">
        <a href="{{ route('register') }}">Register a new account</a>
      </p>
    </div>
  </div>
</div>
@endsection
