@extends('layouts.app')
@section('title','New Invoice')
@section('content')
<div class="card">
  <div class="card-header"><h3 class="card-title">Generate Invoice</h3></div>
  <div class="card-body">
    <form action="{{ route('invoices.store') }}" method="POST">
      @csrf
      @include('invoices.form')
      <button class="btn btn-success">Save Invoice</button>
      <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Back</a>
    </form>
  </div>
</div>
<!-- JS to clone service rows -->
@push('scripts')
<script>
  document.getElementById('add-service').onclick = () => {
    let wrapper = document.getElementById('services-wrapper');
    let count = wrapper.querySelectorAll('.service-row').length;
    let row = wrapper.querySelector('.service-row').cloneNode(true);
    row.querySelectorAll('input').forEach(i=>i.value='');
    row.querySelectorAll('input').forEach(i=>{
      let name = i.getAttribute('name').replace(/\[\d+\]/, '['+count+']');
      i.setAttribute('name', name);
    });
    wrapper.appendChild(row);
  };
  document.addEventListener('click', e=>{
    if(e.target.matches('.remove-service')){
      e.target.closest('.service-row').remove();
    }
  });
</script>
@endpush
@endsection