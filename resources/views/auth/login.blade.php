<x-guest-layout>
    <div class="text-center mb-4">
        <h1 class="h3 fw-bold mb-2">Admin Login</h1>
        <p class="text-secondary mb-0">Masuk untuk mengelola katalog laptop dan transaksi toko.</p>
    </div>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="small text-decoration-none">Lupa password?</a>
            @endif
        </div>
        <button class="btn btn-primary w-100">Masuk</button>
    </form>
</x-guest-layout>
