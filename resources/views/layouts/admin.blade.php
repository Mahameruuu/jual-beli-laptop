<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin Laptop Store' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f7fb; }
        .admin-sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #101f68, #162f8a);
        }
        .admin-sidebar .nav-link {
            color: rgba(255,255,255,.78);
            border-radius: .9rem;
            margin-bottom: .35rem;
        }
        .admin-sidebar .nav-link.active,
        .admin-sidebar .nav-link:hover {
            color: #fff;
            background: rgba(255,255,255,.12);
        }
        .stat-card, .panel-card {
            border: 0;
            border-radius: 1.2rem;
            box-shadow: 0 12px 30px rgba(17, 31, 74, 0.08);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <aside class="col-lg-2 col-md-3 p-4 admin-sidebar">
                <a href="{{ route('admin.dashboard') }}" class="d-block fs-4 fw-bold text-white text-decoration-none mb-4">Laptop Store</a>
                <nav class="nav flex-column">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
                    <a href="{{ route('admin.brands.index') }}" class="nav-link {{ request()->routeIs('admin.brands.*') ? 'active' : '' }}">Brand</a>
                    <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">Kategori</a>
                    <a href="{{ route('admin.laptops.index') }}" class="nav-link {{ request()->routeIs('admin.laptops.*') ? 'active' : '' }}">Laptop</a>
                    <a href="{{ route('admin.customers.index') }}" class="nav-link {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">Customer</a>
                    <a href="{{ route('admin.transactions.index') }}" class="nav-link {{ request()->routeIs('admin.transactions.*') ? 'active' : '' }}">Transaksi</a>
                    <a href="{{ route('home') }}" class="nav-link">Lihat Landing Page</a>
                </nav>
            </aside>
            <main class="col-lg-10 col-md-9 ms-sm-auto px-0">
                <nav class="navbar navbar-expand bg-white border-bottom px-4 py-3">
                    <div>
                        <h1 class="h4 mb-0 fw-bold">@yield('page-title', 'Dashboard')</h1>
                        <small class="text-secondary">@yield('page-subtitle', 'Kelola toko laptop Anda')</small>
                    </div>
                    <div class="ms-auto d-flex align-items-center gap-3">
                        <span class="text-secondary small">{{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-outline-danger btn-sm">Logout</button>
                        </form>
                    </div>
                </nav>
                <div class="p-4">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>
