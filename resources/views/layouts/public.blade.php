<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Laptop Store' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --navy: #101f68;
            --navy-soft: #223b99;
            --accent: #ff7b39;
            --peach: #ffe5d8;
            --ink: #25304c;
        }

        body {
            font-family: "Segoe UI", sans-serif;
            color: var(--ink);
            background:
                radial-gradient(circle at top left, rgba(255, 123, 57, 0.15), transparent 30%),
                linear-gradient(180deg, #f6f8ff 0%, #ffffff 55%, #f8f9ff 100%);
        }

        .navbar-blur {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.92);
        }

        .hero-section {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, var(--navy) 0%, #162c84 50%, #ffffff 50%, #ffffff 100%);
        }

        .hero-section::before {
            content: "";
            position: absolute;
            inset: auto -10% 8% -10%;
            height: 180px;
            background: linear-gradient(90deg, rgba(255, 204, 204, 0.7), rgba(255, 255, 255, 0.95));
            border-radius: 100% 100% 0 0 / 100% 100% 0 0;
            transform: rotate(-4deg);
        }

        .hero-card {
            background: linear-gradient(155deg, rgba(255, 255, 255, 0.14), rgba(255, 255, 255, 0.04));
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
        }

        .floating-laptop {
            transform: rotate(-8deg);
            box-shadow: 0 35px 60px rgba(8, 18, 79, 0.28);
        }

        .brand-pill,
        .section-chip {
            background: rgba(255, 123, 57, 0.12);
            color: var(--accent);
            border-radius: 999px;
            font-size: 0.82rem;
            padding: 0.4rem 0.85rem;
        }

        .product-card,
        .feature-card,
        .brand-card {
            border: 0;
            border-radius: 1.4rem;
            box-shadow: 0 14px 36px rgba(33, 50, 112, 0.08);
        }

        .product-visual {
            min-height: 180px;
            border-radius: 1rem;
            background: linear-gradient(135deg, #eef2ff, #ffffff);
        }

        .laptop-placeholder {
            height: 220px;
            border-radius: 1.4rem;
            background:
                radial-gradient(circle at top right, rgba(255, 123, 57, 0.25), transparent 30%),
                linear-gradient(145deg, #dbe5ff, #f8fbff);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--navy);
            font-weight: 700;
            letter-spacing: 0.08em;
        }

        .footer-wave {
            background: linear-gradient(135deg, var(--navy) 0%, #192c7c 100%);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top navbar-blur border-bottom">
        <div class="container py-2">
            <a class="navbar-brand fw-bold text-primary" href="{{ route('home') }}">Laptop Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Tentang Toko</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('laptops.index') }}">Daftar Laptop</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('brands.index') }}">Brand Laptop</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Kontak</a></li>
                    <li class="nav-item ms-lg-2"><a class="btn btn-primary rounded-pill px-4" href="{{ route('login') }}">Admin Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="footer-wave text-white mt-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h5 class="fw-bold">Laptop Store</h5>
                    <p class="mb-0 text-white-50">Solusi laptop modern untuk gaming, kerja, kuliah, dan content creation.</p>
                </div>
                <div class="col-lg-4">
                    <h6 class="fw-semibold">Halaman</h6>
                    <div class="d-flex flex-column gap-2">
                        <a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a>
                        <a href="{{ route('laptops.index') }}" class="text-white-50 text-decoration-none">Daftar Laptop</a>
                        <a href="{{ route('brands.index') }}" class="text-white-50 text-decoration-none">Brand Laptop</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h6 class="fw-semibold">Kontak</h6>
                    <p class="mb-1 text-white-50">Jl. Laptop Center No. 88, Surabaya</p>
                    <p class="mb-1 text-white-50">admin@laptopstore.test</p>
                    <p class="mb-0 text-white-50">0812-3456-7890</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
