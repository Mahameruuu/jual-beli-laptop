<x-guest-layout>
    <div class="text-center mb-4">
        <h1 class="h3 fw-bold mb-2">Buat Akun</h1>
        <p class="text-secondary mb-0">Pendaftaran ini membuat akun customer. Akses admin hanya untuk user dengan role admin.</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required autofocus>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
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
        <div class="mb-4">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required>
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary w-100 mb-3">Daftar</button>
        <p class="text-center small mb-0">Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none">Masuk</a></p>
    </form>
</x-guest-layout>
