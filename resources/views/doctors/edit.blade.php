@extends('layouts.app')

@section('title', 'Edit Doctor')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Doctor</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name', $doctor->name) }}">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required value="{{ old('email', $doctor->email) }}">
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $doctor->phone) }}">
            </div>

            <div class="form-group">
                <label>Specialization</label>
                <input type="text" name="specialization" class="form-control" required value="{{ old('specialization', $doctor->specialization) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Doctor</button>
            <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
