@extends('layouts.app')

@section('title', 'Edit Patient')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Patient</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('patients.update', $patient->id) }}" method="POST">
            @csrf @method('PUT')
            
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" required class="form-control" value="{{ old('name', $patient->name) }}">
            </div>

            <div class="form-group">
                <label>Gender</label>
                <select name="gender" class="form-control">
                    <option value="">-- Select --</option>
                    <option value="male" {{ $patient->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $patient->gender == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" name="dob" class="form-control" value="{{ $patient->dob }}">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $patient->email }}">
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ $patient->phone }}">
            </div>

            <div class="form-group">
                <label>Address</label>
                <textarea name="address" class="form-control">{{ $patient->address }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('patients.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
