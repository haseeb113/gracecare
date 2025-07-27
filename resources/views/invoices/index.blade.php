@extends('layouts.app')
@section('title','Invoices')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Invoices</h3>
    <a href="{{ route('invoices.create') }}" class="btn btn-sm btn-primary float-right">
      <i class="fas fa-file-invoice"></i> New Invoice
    </a>
  </div>
  <div class="card-body">
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th><th>Patient</th><th>Appointment</th><th>Total</th><th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($invoices as $i => $inv)
        <tr>
          <td>{{ $i+1 }}</td>
          <td>{{ $inv->appointment->patient->name }}</td>
          <td>{{ $inv->appointment->scheduled_at }}</td>
          <td>{{ number_format($inv->total_amount,2) }}</td>
          <td>
            <a href="{{ route('invoices.show',$inv) }}" class="btn btn-sm btn-info">View</a>
            <a href="{{ route('invoices.edit',$inv) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('invoices.destroy',$inv) }}" method="POST" style="display:inline">
              @csrf @method('DELETE')
              <button onclick="return confirm('Delete?')" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
        @if($invoices->isEmpty())
        <tr><td colspan="5" class="text-center">No invoices generated.</td></tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
@endsection
