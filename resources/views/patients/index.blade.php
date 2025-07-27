@extends('layouts.app')

@section('title', 'Patients')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Patients</h3>
        <a href="{{ route('patients.create') }}" class="btn btn-sm btn-primary float-right">
            <i class="fas fa-plus"></i> Add Patient
        </a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $index => $patient)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ ucfirst($patient->gender) }}</td>
                    <td>{{ $patient->dob }}</td>
                    <td>{{ $patient->phone }}</td>
                    <td>
                        <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                              onclick="return confirm('Are you sure to delete this patient?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if($patients->isEmpty())
                <tr><td colspan="6" class="text-center">No patient records found.</td></tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
