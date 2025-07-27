@extends('layouts.guest')

@section('title', 'Register')

@section('content')
<div class="register-box mx-auto mt-5">
  <div class="card card-outline card-success">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Grace</b>Care</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Full name" required>
          <div class="input-group-append"><div class="input-group-text"><span class="fas fa-user"></span></div></div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password" required>
          <div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>
        </div>

        <div class="form-group">
          <select name="role" class="form-control" required>
            <option value="" disabled selected>Choose Role</option>
            <option value="admin">Admin</option>
            <option value="doctor">Doctor</option>
            <option value="receptionist">Receptionist</option>
          </select>
        </div>

        <button type="submit" class="btn btn-success btn-block">Register</button>
      </form>

      <p class="mt-3 text-center">
        <a href="{{ route('login') }}">I already have a membership</a>
      </p>
    </div>
  </div>
</div>
@endsection
