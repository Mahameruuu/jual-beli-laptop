@extends('layouts.admin')
@section('page-title', 'Edit Kategori')
@section('content')
<div class="card panel-card"><div class="card-body"><form method="POST" action="{{ route('admin.categories.update', $category) }}">@csrf @method('PUT')<div class="mb-3"><label class="form-label">Nama Kategori</label><input type="text" name="category_name" value="{{ old('category_name', $category->category_name) }}" class="form-control @error('category_name') is-invalid @enderror">@error('category_name')<div class="invalid-feedback">{{ $message }}</div>@enderror</div><button class="btn btn-primary">Update</button></form></div></div>
@endsection
