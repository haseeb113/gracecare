@extends('layouts.app')
@section('title', 'Patients')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>All Patients</h3>
    <a href="{{ route('patients.create') }}" class="btn btn-primary">Add Patient</a>
</div>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Name</th><th>Email</th><th>Phone</th><th>Gender</th><th>DOB</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($patients as $p)
        <tr>
            <td>{{ $p->name }}</td>
            <td>{{ $p->email }}</td>
            <td>{{ $p->phone }}</td>
            <td>{{ ucfirst($p->gender) }}</td>
            <td>{{ $p->dob }}</td>
            <td>
                <a href="{{ route('patients.edit', $p) }}" class="btn btn-sm btn-info">Edit</a>
                <form action="{{ route('patients.destroy', $p) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center">No patients found.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
