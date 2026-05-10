<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laptop Store') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-body-tertiary">
    <nav class="navbar navbar-expand-lg bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="{{ route('home') }}">Laptop Store</a>
            <div class="ms-auto d-flex gap-2">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-primary">Admin</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-sm btn-outline-danger">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    @isset($header)
        <header class="py-4 bg-white border-bottom">
            <div class="container">
                {{ $header }}
            </div>
        </header>
    @endisset

    <main class="py-4">
        <div class="container">
            {{ $slot }}
        </div>
    </main>
</body>
</html>
