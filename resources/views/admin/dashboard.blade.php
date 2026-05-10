@extends('layouts.admin')

@section('page-title', 'Dashboard')
@section('page-subtitle', 'Ringkasan toko laptop hari ini')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-lg-3 col-md-6"><div class="card stat-card p-4"><div class="text-secondary small">Total Brand</div><div class="fs-2 fw-bold">{{ $totalBrands }}</div></div></div>
    <div class="col-lg-3 col-md-6"><div class="card stat-card p-4"><div class="text-secondary small">Total Laptop</div><div class="fs-2 fw-bold">{{ $totalLaptops }}</div></div></div>
    <div class="col-lg-3 col-md-6"><div class="card stat-card p-4"><div class="text-secondary small">Total Customer</div><div class="fs-2 fw-bold">{{ $totalCustomers }}</div></div></div>
    <div class="col-lg-3 col-md-6"><div class="card stat-card p-4"><div class="text-secondary small">Total Transaksi</div><div class="fs-2 fw-bold">{{ $totalTransactions }}</div></div></div>
</div>

<div class="card panel-card">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Transaksi Terbaru</h5>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recentTransactions as $transaction)
                        <tr>
                            <td>#{{ $transaction->id }}</td>
                            <td>{{ $transaction->customer->customer_name }}</td>
                            <td>{{ $transaction->transaction_date->format('d M Y') }}</td>
                            <td>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                            <td><span class="badge text-bg-primary text-capitalize">{{ $transaction->status }}</span></td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-secondary">Belum ada transaksi.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
