@extends('layouts.app')

@section('title', 'Doctors List')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Doctors</h3>
        <a href="{{ route('doctors.create') }}" class="btn btn-sm btn-primary float-right">
            <i class="fas fa-plus"></i> Add Doctor
        </a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Specialization</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctors as $index => $doctor)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->email }}</td>
                        <td>{{ $doctor->phone }}</td>
                        <td>{{ $doctor->specialization }}</td>
                        <td>
                            <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                  onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if($doctors->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center text-muted">No doctors found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
