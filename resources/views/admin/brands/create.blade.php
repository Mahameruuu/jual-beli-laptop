@extends('layouts.admin')
@section('page-title', 'Tambah Brand')
@section('content')
<div class="card panel-card"><div class="card-body"><form method="POST" action="{{ route('admin.brands.store') }}">@csrf<div class="mb-3"><label class="form-label">Nama Brand</label><input type="text" name="brand_name" value="{{ old('brand_name') }}" class="form-control @error('brand_name') is-invalid @enderror">@error('brand_name')<div class="invalid-feedback">{{ $message }}</div>@enderror</div><button class="btn btn-primary">Simpan</button></form></div></div>
@endsection
