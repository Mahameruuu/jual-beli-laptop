@extends('layouts.public')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-chip">Daftar Laptop</span>
            <h1 class="fw-bold mt-3">Katalog Laptop Tersedia</h1>
            <p class="text-secondary mb-0">Jelajahi pilihan laptop berdasarkan brand, kategori, dan kebutuhan performa Anda.</p>
        </div>
        <div class="row g-4">
            @foreach ($laptops as $laptop)
                <div class="col-lg-4 col-md-6">
                    <div class="card product-card h-100 p-3">
                        @if ($laptop->image)
                            <img src="{{ Storage::url($laptop->image) }}" alt="{{ $laptop->laptop_name }}" class="product-visual object-fit-cover w-100">
                        @else
                            <div class="product-visual d-flex align-items-center justify-content-center fw-bold">{{ $laptop->brand->brand_name }}</div>
                        @endif
                        <div class="card-body px-0 pb-0">
                            <div class="d-flex gap-2 flex-wrap mb-2">
                                <span class="section-chip">{{ $laptop->brand->brand_name }}</span>
                                <span class="section-chip">{{ $laptop->category->category_name }}</span>
                            </div>
                            <h5 class="fw-bold">{{ $laptop->laptop_name }}</h5>
                            <p class="text-secondary small mb-2">{{ $laptop->processor }} • {{ $laptop->ram }} • {{ $laptop->storage }}</p>
                            <p class="small mb-3">VGA: {{ $laptop->vga }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="fw-bold text-primary">Rp {{ number_format($laptop->price, 0, ',', '.') }}</div>
                                <a href="{{ route('laptops.show', $laptop) }}" class="btn btn-outline-primary rounded-pill">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $laptops->links() }}
        </div>
    </div>
</section>
@endsection
