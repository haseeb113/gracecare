@extends('layouts.app')
@section('title', 'Edit Patient')

@section('content')
<h3 class="mb-3">Edit Patient</h3>

<form method="POST" action="{{ route('patients.update', $patient) }}">
    @csrf
    @method('PUT')
    @include('patients.form', ['patient' => $patient])
    <button type="submit" class="btn btn-primary">Update Patient</button>
    <a href="{{ route('patients.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
