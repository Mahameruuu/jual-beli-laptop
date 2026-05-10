@extends('layouts.admin')
@section('page-title', 'Tambah Transaksi')
@section('content')
<div class="card panel-card"><div class="card-body">
<form method="POST" action="{{ route('admin.transactions.store') }}">
@csrf
<div class="row g-3">
<div class="col-md-4"><label class="form-label">Customer</label><select name="customer_id" class="form-select @error('customer_id') is-invalid @enderror"><option value="">Pilih customer</option>@foreach($customers as $customer)<option value="{{ $customer->id }}" @selected(old('customer_id') == $customer->id)>{{ $customer->customer_name }}</option>@endforeach</select>@error('customer_id')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
<div class="col-md-4"><label class="form-label">Tanggal</label><input type="date" name="transaction_date" value="{{ old('transaction_date', now()->toDateString()) }}" class="form-control @error('transaction_date') is-invalid @enderror">@error('transaction_date')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
<div class="col-md-4"><label class="form-label">Status</label><select name="status" class="form-select @error('status') is-invalid @enderror"><option value="pending" @selected(old('status') == 'pending')>Pending</option><option value="paid" @selected(old('status') == 'paid')>Paid</option><option value="cancelled" @selected(old('status') == 'cancelled')>Cancelled</option></select>@error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
</div>
<hr class="my-4">
<div id="items-wrapper">
    @php $oldItems = old('items', [['laptop_id' => '', 'quantity' => 1]]); @endphp
    @foreach($oldItems as $index => $item)
        <div class="row g-3 align-items-end item-row mb-3">
            <div class="col-md-8"><label class="form-label">Laptop</label><select name="items[{{ $index }}][laptop_id]" class="form-select"><option value="">Pilih laptop</option>@foreach($laptops as $laptop)<option value="{{ $laptop->id }}" @selected(($item['laptop_id'] ?? '') == $laptop->id)>{{ $laptop->laptop_name }} - stok {{ $laptop->stock }}</option>@endforeach</select></div>
            <div class="col-md-3"><label class="form-label">Qty</label><input type="number" name="items[{{ $index }}][quantity]" value="{{ $item['quantity'] ?? 1 }}" min="1" class="form-control"></div>
            <div class="col-md-1"><button type="button" class="btn btn-outline-danger remove-item">X</button></div>
        </div>
    @endforeach
</div>
@error('items')<div class="text-danger small mb-3">{{ $message }}</div>@enderror
<button type="button" class="btn btn-outline-primary mb-4" id="add-item">Tambah Baris</button>
<div><button class="btn btn-primary">Simpan Transaksi</button></div>
</form>
</div></div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const wrapper = document.getElementById('items-wrapper');
    const addButton = document.getElementById('add-item');
    const laptopOptions = `{!! collect($laptops)->map(fn($laptop) => '<option value="'.$laptop->id.'">'.$laptop->laptop_name.' - stok '.$laptop->stock.'</option>')->implode('') !!}`;

    addButton.addEventListener('click', function () {
        const index = wrapper.querySelectorAll('.item-row').length;
        const row = document.createElement('div');
        row.className = 'row g-3 align-items-end item-row mb-3';
        row.innerHTML = `
            <div class="col-md-8"><label class="form-label">Laptop</label><select name="items[${index}][laptop_id]" class="form-select"><option value="">Pilih laptop</option>${laptopOptions}</select></div>
            <div class="col-md-3"><label class="form-label">Qty</label><input type="number" name="items[${index}][quantity]" value="1" min="1" class="form-control"></div>
            <div class="col-md-1"><button type="button" class="btn btn-outline-danger remove-item">X</button></div>
        `;
        wrapper.appendChild(row);
    });

    wrapper.addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-item') && wrapper.querySelectorAll('.item-row').length > 1) {
            event.target.closest('.item-row').remove();
        }
    });
});
</script>
@endsection
