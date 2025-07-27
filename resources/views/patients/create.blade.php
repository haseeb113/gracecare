@extends('layouts.app')
@section('title', 'Add Patient')

@section('content')
<h3 class="mb-3">Add Patient</h3>

<form method="POST" action="{{ route('patients.store') }}">
    @csrf
    @include('patients.form')
    <button type="submit" class="btn btn-success">Save Patient</button>
    <a href="{{ route('patients.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
