@extends('layouts.app')
@section('title','New Appointment')
@section('content')
<div class="card">
  <div class="card-header"><h3 class="card-title">New Appointment</h3></div>
  <div class="card-body">
    <form action="{{ route('appointments.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label>Patient</label>
        <select name="patient_id" class="form-control" required>
          @foreach($patients as $p)
            <option value="{{ $p->id }}">{{ $p->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Doctor</label>
        <select name="doctor_id" class="form-control" required>
          @foreach($doctors as $d)
            <option value="{{ $d->id }}">{{ $d->name }} ({{ $d->specialization }})</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>When</label>
        <input type="datetime-local" name="scheduled_at" class="form-control" required>
      </div>
      <button class="btn btn-success">Book</button>
      <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Back</a>
    </form>
  </div>
</div>
@endsection
