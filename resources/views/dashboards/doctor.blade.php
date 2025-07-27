@extends('layouts.app')
@section('title', 'Doctor Dashboard')

@section('content')
<div class="card">
  <div class="card-header"><h3 class="card-title">Doctor Dashboard</h3></div>
  <div class="card-body">
    <p>Welcome, Dr. {{ auth()->user()->name }}! You are logged in as <strong>Doctor</strong>.</p>
  </div>
</div>
@endsection
