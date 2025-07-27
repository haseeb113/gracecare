@extends('layouts.app')
@section('title','Appointments')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Appointments</h3>
    @if(auth()->user()->role === 'receptionist')
    <a href="{{ route('appointments.create') }}" class="btn btn-sm btn-primary float-right">
      <i class="fas fa-calendar-plus"></i> New Appointment
    </a>
    @endif
  </div>
  <div class="card-body">
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th><th>Patient</th><th>Doctor</th><th>When</th><th>Status</th><th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($appointments as $i => $app)
        <tr>
          <td>{{ $i+1 }}</td>
          <td>{{ $app->patient->name }}</td>
          <td>{{ $app->doctor->name }}</td>
          <td>{{ $app->scheduled_at }}</td>
          <td>{{ ucfirst($app->status) }}</td>
          <td>
            @if(auth()->user()->role==='receptionist')
            <a href="{{ route('appointments.edit',$app) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('appointments.destroy',$app) }}" method="POST" style="display:inline">
              @csrf @method('DELETE')
              <button onclick="return confirm('Cancel?')" class="btn btn-sm btn-danger">Cancel</button>
            </form>
            @endif
          </td>
        </tr>
        @endforeach
        @if($appointments->isEmpty())
        <tr><td colspan="6" class="text-center">No appointments.</td></tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
@endsection
