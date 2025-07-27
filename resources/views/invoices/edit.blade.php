@extends('layouts.app')
@section('title','Edit Invoice')
@section('content')
<div class="card">
  <div class="card-header"><h3 class="card-title">Edit Invoice</h3></div>
  <div class="card-body">
    <form action="{{ route('invoices.update',$invoice) }}" method="POST">
      @csrf @method('PUT')
      @include('invoices.form')
      <button class="btn btn-primary">Update Invoice</button>
      <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Back</a>
    </form>
  </div>
</div>
@endpush
