@extends('layouts.admin')
@section('page-title', 'Tambah Laptop')
@section('content')
<div class="card panel-card"><div class="card-body">
<form method="POST" action="{{ route('admin.laptops.store') }}" enctype="multipart/form-data">
@csrf
<div class="row g-3">
<div class="col-md-6"><label class="form-label">Brand</label><select name="brand_id" class="form-select @error('brand_id') is-invalid @enderror"><option value="">Pilih brand</option>@foreach($brands as $brand)<option value="{{ $brand->id }}" @selected(old('brand_id') == $brand->id)>{{ $brand->brand_name }}</option>@endforeach</select>@error('brand_id')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
<div class="col-md-6"><label class="form-label">Kategori</label><select name="category_id" class="form-select @error('category_id') is-invalid @enderror"><option value="">Pilih kategori</option>@foreach($categories as $category)<option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->category_name }}</option>@endforeach</select>@error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
<div class="col-md-6"><label class="form-label">Nama Laptop</label><input type="text" name="laptop_name" value="{{ old('laptop_name') }}" class="form-control @error('laptop_name') is-invalid @enderror">@error('laptop_name')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
<div class="col-md-6"><label class="form-label">Processor</label><input type="text" name="processor" value="{{ old('processor') }}" class="form-control @error('processor') is-invalid @enderror">@error('processor')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
<div class="col-md-4"><label class="form-label">RAM</label><input type="text" name="ram" value="{{ old('ram') }}" class="form-control @error('ram') is-invalid @enderror">@error('ram')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
<div class="col-md-4"><label class="form-label">Storage</label><input type="text" name="storage" value="{{ old('storage') }}" class="form-control @error('storage') is-invalid @enderror">@error('storage')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
<div class="col-md-4"><label class="form-label">VGA</label><input type="text" name="vga" value="{{ old('vga') }}" class="form-control @error('vga') is-invalid @enderror">@error('vga')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
<div class="col-md-6"><label class="form-label">Harga</label><input type="number" name="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror">@error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
<div class="col-md-6"><label class="form-label">Stok</label><input type="number" name="stock" value="{{ old('stock', 0) }}" class="form-control @error('stock') is-invalid @enderror">@error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
<div class="col-md-12"><label class="form-label">Gambar</label><input type="file" name="image" class="form-control @error('image') is-invalid @enderror">@error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
<div class="col-md-12"><label class="form-label">Deskripsi</label><textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>@error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
</div>
<button class="btn btn-primary mt-4">Simpan</button>
</form>
</div></div>
@endsection
