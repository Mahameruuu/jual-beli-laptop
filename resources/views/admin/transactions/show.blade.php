@extends('layouts.admin')
@section('page-title', 'Detail Transaksi')
@section('content')
<div class="card panel-card"><div class="card-body">
<div class="row g-3 mb-4">
<div class="col-md-4"><strong>Customer:</strong> {{ $transaction->customer->customer_name }}</div>
<div class="col-md-4"><strong>Tanggal:</strong> {{ $transaction->transaction_date->format('d M Y') }}</div>
<div class="col-md-4"><strong>Status:</strong> <span class="badge text-bg-primary text-capitalize">{{ $transaction->status }}</span></div>
</div>
<div class="table-responsive"><table class="table"><thead><tr><th>Laptop</th><th>Brand</th><th>Qty</th><th>Harga</th><th>Subtotal</th></tr></thead><tbody>@foreach($transaction->details as $detail)<tr><td>{{ $detail->laptop->laptop_name }}</td><td>{{ $detail->laptop->brand->brand_name }}</td><td>{{ $detail->quantity }}</td><td>Rp {{ number_format($detail->price, 0, ',', '.') }}</td><td>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td></tr>@endforeach</tbody></table></div>
<div class="text-end fw-bold fs-5">Total: Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</div>
</div></div>
@endsection
