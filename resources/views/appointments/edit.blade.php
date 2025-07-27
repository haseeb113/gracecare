@extends('layouts.app')
@section('title','Edit Appointment')
@section('content')
<div class="card">
  <div class="card-header"><h3 class="card-title">Edit Appointment</h3></div>
  <div class="card-body">
    <form action="{{ route('appointments.update',$appointment) }}" method="POST">
      @csrf @method('PUT')
      <div class="form-group">
        <label>Patient</label>
        <select name="patient_id" class="form-control" required>
          @foreach($patients as $p)
            <option value="{{ $p->id }}" {{ $appointment->patient_id==$p->id?'selected':'' }}>
              {{ $p->name }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Doctor</label>
        <select name="doctor_id" class="form-control" required>
          @foreach($doctors as $d)
            <option value="{{ $d->id }}" {{ $appointment->doctor_id==$d->id?'selected':'' }}>
              {{ $d->name }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>When</label>
        <input type="datetime-local" name="scheduled_at" class="form-control"
               value="{{ str_replace(' ','T',$appointment->scheduled_at) }}" required>
      </div>
      <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control">
          @foreach(['scheduled','completed','cancelled'] as $s)
            <option value="{{ $s }}" {{ $appointment->status==$s?'selected':'' }}>
              {{ ucfirst($s) }}
            </option>
          @endforeach
        </select>
      </div>
      <button class="btn btn-primary">Update</button>
      <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Back</a>
    </form>
  </div>
</div>
@endsection
