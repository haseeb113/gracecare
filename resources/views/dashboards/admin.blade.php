@extends('layouts.app')
@section('title', 'Admin Dashboard')

@section('content')
<div class="card">
  <div class="card-header"><h3 class="card-title">Admin Dashboard</h3></div>
  <div class="card-body">
    <p>Welcome, {{ auth()->user()->name }}! You are logged in as <strong>Admin</strong>.</p>
  </div>
</div>
@endsection
