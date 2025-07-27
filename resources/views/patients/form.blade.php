@php
    $p = $patient ?? null;
@endphp

<div class="form-group">
    <label>Name</label>
    <input name="name" class="form-control" value="{{ old('name', $p->name ?? '') }}" required>
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $p->email ?? '') }}">
</div>

<div class="form-group">
    <label>Phone</label>
    <input name="phone" class="form-control" value="{{ old('phone', $p->phone ?? '') }}">
</div>

<div class="form-group">
    <label>Gender</label>
    <select name="gender" class="form-control">
        <option value="">-- Select --</option>
        <option value="male" {{ old('gender', $p->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ old('gender', $p->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
    </select>
</div>

<div class="form-group">
    <label>Date of Birth</label>
    <input type="date" name="dob" class="form-control" value="{{ old('dob', $p->dob ?? '') }}">
</div>

<div class="form-group">
    <label>Address</label>
    <textarea name="address" class="form-control">{{ old('address', $p->address ?? '') }}</textarea>
</div>
