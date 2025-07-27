@extends('layouts.app')
@section('title','New Prescription')
@section('content')
<div class="card">
  <div class="card-header"><h3 class="card-title">New Prescription</h3></div>
  <div class="card-body">
    <form action="{{ route('prescriptions.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label>Appointment</label>
        <select name="appointment_id" class="form-control" required>
          @foreach($appointments as $a)
            <option value="{{ $a->id }}">{{ $a->patient->name }} — {{ $a->scheduled_at }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Medication</label>
        <textarea name="medication" class="form-control" required>{{ old('medication') }}</textarea>
      </div>
      <div class="form-group">
        <label>Instructions</label>
        <textarea name="instructions" class="form-control">{{ old('instructions') }}</textarea>
      </div>
      <button class="btn btn-success">Save</button>
      <a href="{{ route('prescriptions.index') }}" class="btn btn-secondary">Back</a>
    </form>
  </div>
</div>
@endsection
