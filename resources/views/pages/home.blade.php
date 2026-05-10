@extends('layouts.public')

@section('content')
<section class="hero-section text-white py-5 py-lg-6">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 position-relative">
                <span class="section-chip d-inline-block mb-3 text-uppercase fw-semibold">Laptop Store Surabaya</span>
                <h1 class="display-5 fw-bold mb-3">Laptop terbaik untuk kerja, gaming, dan kuliah dalam satu tempat.</h1>
                <p class="lead text-white-50 mb-4">Temukan laptop dengan spesifikasi modern, harga kompetitif, dan pilihan brand favorit untuk kebutuhan harian maupun profesional.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('laptops.index') }}" class="btn btn-warning rounded-pill px-4">Lihat Laptop</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light rounded-pill px-4">Hubungi Toko</a>
                </div>
                <div class="row row-cols-2 g-3 mt-4">
                    <div class="col">
                        <div class="hero-card rounded-4 p-3">
                            <div class="fs-3 fw-bold">{{ $laptopCount }}+</div>
                            <div class="text-white-50">Pilihan laptop</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="hero-card rounded-4 p-3">
                            <div class="fs-3 fw-bold">{{ $brandCount }}+</div>
                            <div class="text-white-50">Brand terpercaya</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <div class="laptop-placeholder floating-laptop">LAPTOP</div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-wrap gap-3 mt-5 pt-2">
            @foreach ($brands as $brand)
                <span class="brand-pill fw-semibold">{{ $brand->brand_name }}</span>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-chip">Produk Terbaru</span>
            <h2 class="fw-bold mt-3">Pilihan laptop paling dicari</h2>
            <p class="text-secondary mb-0">Katalog unggulan yang siap menunjang performa kerja dan hiburan.</p>
        </div>
        <div class="row g-4">
            @foreach ($featuredLaptops as $laptop)
                <div class="col-lg-4 col-md-6">
                    <div class="card product-card h-100 p-3">
                        @if ($laptop->image)
                            <img src="{{ Storage::url($laptop->image) }}" alt="{{ $laptop->laptop_name }}" class="product-visual object-fit-cover w-100">
                        @else
                            <div class="product-visual d-flex align-items-center justify-content-center fw-bold">{{ $laptop->brand->brand_name }}</div>
                        @endif
                        <div class="card-body px-0 pb-0">
                            <span class="section-chip">{{ $laptop->category->category_name }}</span>
                            <h5 class="fw-bold mt-3">{{ $laptop->laptop_name }}</h5>
                            <p class="text-secondary small mb-3">{{ $laptop->processor }} • {{ $laptop->ram }} • {{ $laptop->storage }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-secondary small">Harga</div>
                                    <div class="fw-bold text-primary">Rp {{ number_format($laptop->price, 0, ',', '.') }}</div>
                                </div>
                                <a href="{{ route('laptops.show', $laptop) }}" class="btn btn-outline-primary rounded-pill">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card feature-card p-4 h-100">
                    <h5 class="fw-bold">Koleksi Lengkap</h5>
                    <p class="text-secondary mb-0">Gaming, office, student, hingga content creator tersedia dalam satu katalog yang rapi.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card feature-card p-4 h-100">
                    <h5 class="fw-bold">Brand Ternama</h5>
                    <p class="text-secondary mb-0">Kami menghadirkan ASUS, Acer, Lenovo, HP, MSI, dan Dell dengan pilihan model populer.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card feature-card p-4 h-100">
                    <h5 class="fw-bold">Panel Admin Praktis</h5>
                    <p class="text-secondary mb-0">Pengelolaan produk, brand, kategori, customer, dan transaksi dalam satu dashboard sederhana.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
