@extends('layouts.app')
@section('title', 'Receptionist Dashboard')

@section('content')
<div class="card">
  <div class="card-header"><h3 class="card-title">Receptionist Dashboard</h3></div>
  <div class="card-body">
    <p>Welcome, {{ auth()->user()->name }}! You are logged in as <strong>Receptionist</strong>.</p>
  </div>
</div>
@endsection
