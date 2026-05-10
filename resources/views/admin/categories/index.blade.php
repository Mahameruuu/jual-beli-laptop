@extends('layouts.admin')
@section('page-title', 'Kategori')
@section('content')
<div class="d-flex justify-content-end mb-3"><a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Tambah Kategori</a></div>
<div class="card panel-card"><div class="card-body"><div class="table-responsive"><table class="table align-middle"><thead><tr><th>No</th><th>Nama Kategori</th><th>Aksi</th></tr></thead><tbody>@forelse($categories as $category)<tr><td>{{ $loop->iteration + ($categories->currentPage() - 1) * $categories->perPage() }}</td><td>{{ $category->category_name }}</td><td class="d-flex gap-2"><a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-outline-primary">Edit</a><form method="POST" action="{{ route('admin.categories.destroy', $category) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus kategori ini?')">Hapus</button></form></td></tr>@empty<tr><td colspan="3" class="text-center text-secondary">Data kategori belum ada.</td></tr>@endforelse</tbody></table></div><div>{{ $categories->links() }}</div></div></div>
@endsection
