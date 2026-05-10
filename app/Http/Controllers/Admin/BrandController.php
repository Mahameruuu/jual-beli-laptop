<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BrandController extends Controller
{
    public function index(): View
    {
        return view('admin.brands.index', [
            'brands' => Brand::latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.brands.create');
    }

    public function store(StoreBrandRequest $request): RedirectResponse
    {
        Brand::create($request->validated());

        return redirect()->route('admin.brands.index')->with('success', 'Brand berhasil ditambahkan.');
    }

    public function show(Brand $brand): RedirectResponse
    {
        return redirect()->route('admin.brands.edit', $brand);
    }

    public function edit(Brand $brand): View
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(UpdateBrandRequest $request, Brand $brand): RedirectResponse
    {
        $brand->update($request->validated());

        return redirect()->route('admin.brands.index')->with('success', 'Brand berhasil diperbarui.');
    }

    public function destroy(Brand $brand): RedirectResponse
    {
        $brand->delete();

        return redirect()->route('admin.brands.index')->with('success', 'Brand berhasil dihapus.');
    }
}
