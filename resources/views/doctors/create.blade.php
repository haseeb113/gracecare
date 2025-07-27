@extends('layouts.app')

@section('title', 'Add Doctor')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Add Doctor</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('doctors.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
            </div>

            <div class="form-group">
                <label>Specialization</label>
                <input type="text" name="specialization" class="form-control" required value="{{ old('specialization') }}">
            </div>

            <button type="submit" class="btn btn-success">Save Doctor</button>
            <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
