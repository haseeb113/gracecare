@extends('layouts.app')
@section('title','Prescriptions')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">My Prescriptions</h3>
    <a href="{{ route('prescriptions.create') }}" class="btn btn-sm btn-primary float-right">
      <i class="fas fa-prescription-bottle-alt"></i> New
    </a>
  </div>
  <div class="card-body">
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th><th>Patient</th><th>Appointment</th><th>Medication</th><th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($prescriptions as $i => $pr)
        <tr>
          <td>{{ $i+1 }}</td>
          <td>{{ $pr->patient->name }}</td>
          <td>{{ $pr->appointment->scheduled_at }}</td>
          <td>{{ Str::limit($pr->medication, 50) }}</td>
          <td>
            <a href="{{ route('prescriptions.edit',$pr) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('prescriptions.destroy',$pr) }}" method="POST" style="display:inline">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
        @if($prescriptions->isEmpty())
        <tr><td colspan="5" class="text-center">No prescriptions found.</td></tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
@endsection
