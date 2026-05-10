<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laptop Store') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(255, 132, 61, 0.2), transparent 35%),
                linear-gradient(135deg, #0f1d63, #132d8f 48%, #f5f7ff 48%, #fff 100%);
        }
    </style>
</head>
<body class="d-flex align-items-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="text-center mb-4">
                    <a href="{{ route('home') }}" class="text-decoration-none">
                        <span class="badge rounded-pill px-3 py-2 text-bg-light shadow-sm">Laptop Store</span>
                    </a>
                </div>
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-body p-4 p-md-5">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
