@php
  $inv = $invoice ?? null;
@endphp

<div class="form-group">
  <label>Appointment</label>
  <select name="appointment_id" class="form-control" {{ $inv ? 'disabled' : '' }}>
    <option value="">-- Select --</option>
    @foreach($appointments as $a)
      <option value="{{ $a->id }}"
        {{ old('appointment_id', $inv->appointment_id ?? '') == $a->id ? 'selected' : '' }}>
        {{ $a->patient->name }} — {{ $a->scheduled_at }}
      </option>
    @endforeach
  </select>
</div>

<h5>Services</h5>
<div id="services-wrapper">
  @php $items = old('services', $inv ? $inv->services->toArray() : [['name'=>'','price'=>'']]); @endphp
  @foreach($items as $idx => $s)
  <div class="row mb-2 service-row">
    <div class="col"><input name="services[{{ $idx }}][name]" class="form-control" placeholder="Service name"
           value="{{ $s['name'] ?? '' }}"></div>
    <div class="col"><input name="services[{{ $idx }}][price]" class="form-control" placeholder="Price"
           value="{{ $s['price'] ?? '' }}"></div>
    <div class="col-auto">
      <button type="button" class="btn btn-danger remove-service">&times;</button>
    </div>
  </div>
  @endforeach
</div>
<button type="button" id="add-service" class="btn btn-sm btn-secondary mb-3">+ Add Service</button>
