@extends('layouts.public')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-chip">Brand Laptop</span>
            <h1 class="fw-bold mt-3">Partner Brand Terpercaya</h1>
            <p class="text-secondary mb-0">Koleksi brand populer dengan model yang relevan untuk berbagai kebutuhan.</p>
        </div>
        <div class="row g-4">
            @foreach ($brands as $brand)
                <div class="col-lg-4 col-md-6">
                    <div class="card brand-card h-100 p-4 text-center">
                        <div class="display-6 fw-bold text-primary mb-3">{{ $brand->brand_name }}</div>
                        <p class="text-secondary mb-0">{{ $brand->laptops_count }} laptop tersedia dalam katalog.</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
