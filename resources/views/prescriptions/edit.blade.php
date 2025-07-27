@extends('layouts.app')
@section('title','Edit Prescription')
@section('content')
<div class="card">
  <div class="card-header"><h3 class="card-title">Edit Prescription</h3></div>
  <div class="card-body">
    <form action="{{ route('prescriptions.update',$prescription) }}" method="POST">
      @csrf @method('PUT')
      <div class="form-group">
        <label>Appointment</label>
        <select name="appointment_id" class="form-control" required>
          @foreach($appointments as $a)
            <option value="{{ $a->id }}" {{ $prescription->appointment_id==$a->id?'selected':'' }}>
              {{ $a->patient->name }} — {{ $a->scheduled_at }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Medication</label>
        <textarea name="medication" class="form-control" required>{{ old('medication',$prescription->medication) }}</textarea>
      </div>
      <div class="form-group">
        <label>Instructions</label>
        <textarea name="instructions" class="form-control">{{ old('instructions',$prescription->instructions) }}</textarea>
      </div>
      <button class="btn btn-primary">Update</button>
      <a href="{{ route('prescriptions.index') }}" class="btn btn-secondary">Back</a>
    </form>
  </div>
</div>
@endsection
