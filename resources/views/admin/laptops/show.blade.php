@extends('layouts.admin')
@section('page-title', 'Detail Laptop')
@section('content')
<div class="card panel-card"><div class="card-body">
<div class="row g-4">
<div class="col-lg-4">@if($laptop->image)<img src="{{ Storage::url($laptop->image) }}" class="img-fluid rounded-4" alt="{{ $laptop->laptop_name }}">@else<div class="laptop-placeholder">{{ $laptop->brand->brand_name }}</div>@endif</div>
<div class="col-lg-8"><h3 class="fw-bold">{{ $laptop->laptop_name }}</h3><p class="text-secondary">{{ $laptop->brand->brand_name }} • {{ $laptop->category->category_name }}</p><div class="row g-3"><div class="col-md-6"><strong>Processor:</strong> {{ $laptop->processor }}</div><div class="col-md-6"><strong>RAM:</strong> {{ $laptop->ram }}</div><div class="col-md-6"><strong>Storage:</strong> {{ $laptop->storage }}</div><div class="col-md-6"><strong>VGA:</strong> {{ $laptop->vga }}</div><div class="col-md-6"><strong>Harga:</strong> Rp {{ number_format($laptop->price, 0, ',', '.') }}</div><div class="col-md-6"><strong>Stok:</strong> {{ $laptop->stock }}</div></div><p class="mt-3 mb-0">{{ $laptop->description }}</p></div>
</div>
</div></div>
@endsection
