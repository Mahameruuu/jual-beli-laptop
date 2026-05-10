@extends('layouts.admin')
@section('page-title', 'Brand')
@section('content')
<div class="d-flex justify-content-end mb-3"><a href="{{ route('admin.brands.create') }}" class="btn btn-primary">Tambah Brand</a></div>
<div class="card panel-card"><div class="card-body"><div class="table-responsive"><table class="table align-middle"><thead><tr><th>No</th><th>Nama Brand</th><th>Aksi</th></tr></thead><tbody>@forelse($brands as $brand)<tr><td>{{ $loop->iteration + ($brands->currentPage() - 1) * $brands->perPage() }}</td><td>{{ $brand->brand_name }}</td><td class="d-flex gap-2"><a href="{{ route('admin.brands.edit', $brand) }}" class="btn btn-sm btn-outline-primary">Edit</a><form method="POST" action="{{ route('admin.brands.destroy', $brand) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus brand ini?')">Hapus</button></form></td></tr>@empty<tr><td colspan="3" class="text-center text-secondary">Data brand belum ada.</td></tr>@endforelse</tbody></table></div><div>{{ $brands->links() }}</div></div></div>
@endsection
