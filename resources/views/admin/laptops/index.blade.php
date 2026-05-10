@extends('layouts.admin')
@section('page-title', 'Laptop')
@section('content')
<div class="d-flex flex-wrap justify-content-between gap-3 mb-3">
    <form method="GET" class="d-flex gap-2">
        <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Cari laptop...">
        <button class="btn btn-outline-primary">Search</button>
    </form>
    <a href="{{ route('admin.laptops.create') }}" class="btn btn-primary">Tambah Laptop</a>
</div>
<div class="card panel-card"><div class="card-body"><div class="table-responsive"><table class="table align-middle"><thead><tr><th>Nama</th><th>Brand</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Aksi</th></tr></thead><tbody>@forelse($laptops as $laptop)<tr><td>{{ $laptop->laptop_name }}</td><td>{{ $laptop->brand->brand_name }}</td><td>{{ $laptop->category->category_name }}</td><td>Rp {{ number_format($laptop->price, 0, ',', '.') }}</td><td>{{ $laptop->stock }}</td><td class="d-flex gap-2 flex-wrap"><a href="{{ route('admin.laptops.show', $laptop) }}" class="btn btn-sm btn-outline-secondary">Detail</a><a href="{{ route('admin.laptops.edit', $laptop) }}" class="btn btn-sm btn-outline-primary">Edit</a><form method="POST" action="{{ route('admin.laptops.destroy', $laptop) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus laptop ini?')">Hapus</button></form></td></tr>@empty<tr><td colspan="6" class="text-center text-secondary">Data laptop belum ada.</td></tr>@endforelse</tbody></table></div><div>{{ $laptops->links() }}</div></div></div>
@endsection
