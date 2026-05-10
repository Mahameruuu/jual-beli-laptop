@extends('layouts.public')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                @if ($laptop->image)
                    <img src="{{ Storage::url($laptop->image) }}" alt="{{ $laptop->laptop_name }}" class="w-100 rounded-4 shadow">
                @else
                    <div class="laptop-placeholder">{{ $laptop->brand->brand_name }}</div>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="d-flex gap-2 flex-wrap mb-3">
                    <span class="section-chip">{{ $laptop->brand->brand_name }}</span>
                    <span class="section-chip">{{ $laptop->category->category_name }}</span>
                </div>
                <h1 class="fw-bold mb-3">{{ $laptop->laptop_name }}</h1>
                <div class="fs-3 fw-bold text-primary mb-4">Rp {{ number_format($laptop->price, 0, ',', '.') }}</div>
                <div class="row row-cols-2 g-3 mb-4">
                    <div class="col"><div class="card feature-card p-3 h-100"><small class="text-secondary">Processor</small><strong>{{ $laptop->processor }}</strong></div></div>
                    <div class="col"><div class="card feature-card p-3 h-100"><small class="text-secondary">RAM</small><strong>{{ $laptop->ram }}</strong></div></div>
                    <div class="col"><div class="card feature-card p-3 h-100"><small class="text-secondary">Storage</small><strong>{{ $laptop->storage }}</strong></div></div>
                    <div class="col"><div class="card feature-card p-3 h-100"><small class="text-secondary">VGA</small><strong>{{ $laptop->vga }}</strong></div></div>
                </div>
                <p class="text-secondary">{{ $laptop->description ?: 'Belum ada deskripsi untuk laptop ini.' }}</p>
                <p class="mb-4"><strong>Stok tersedia:</strong> {{ $laptop->stock }}</p>
                <a href="{{ route('contact') }}" class="btn btn-primary rounded-pill px-4">Hubungi Admin</a>
            </div>
        </div>

        @if ($relatedLaptops->isNotEmpty())
            <div class="mt-5 pt-4">
                <h3 class="fw-bold mb-4">Laptop Terkait</h3>
                <div class="row g-4">
                    @foreach ($relatedLaptops as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="card product-card h-100 p-3">
                                <div class="product-visual d-flex align-items-center justify-content-center fw-bold">{{ $item->brand->brand_name }}</div>
                                <div class="card-body px-0 pb-0">
                                    <h5 class="fw-bold">{{ $item->laptop_name }}</h5>
                                    <p class="text-secondary small">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                    <a href="{{ route('laptops.show', $item) }}" class="btn btn-outline-primary rounded-pill">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
