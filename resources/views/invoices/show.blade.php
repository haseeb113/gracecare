@extends('layouts.app')
@section('title','Invoice #'.$invoice->id)
@section('content')
<div class="card">
  <div class="card-header"><h3 class="card-title">Invoice #{{ $invoice->id }}</h3></div>
  <div class="card-body">
    <p><strong>Patient:</strong> {{ $invoice->appointment->patient->name }}</p>
    <p><strong>Appointment:</strong> {{ $invoice->appointment->scheduled_at }}</p>
    <table class="table">
      <thead><tr><th>Service</th><th>Price</th></tr></thead>
      <tbody>
        @foreach($invoice->services as $s)
        <tr><td>{{ $s->name }}</td><td>{{ number_format($s->price,2) }}</td></tr>
        @endforeach
      </tbody>
      <tfoot><tr><th>Total</th><th>{{ number_format($invoice->total_amount,2) }}</th></tr></tfoot>
    </table>
  </div>
</div>
@endsection
