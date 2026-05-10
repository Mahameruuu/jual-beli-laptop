<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLaptopRequest;
use App\Http\Requests\UpdateLaptopRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Laptop;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class LaptopController extends Controller
{
    public function index(): View
    {
        $search = request('search');

        $laptops = Laptop::with(['brand', 'category'])
            ->when($search, function ($query) use ($search) {
                $query->where('laptop_name', 'like', "%{$search}%")
                    ->orWhere('processor', 'like', "%{$search}%")
                    ->orWhere('ram', 'like', "%{$search}%")
                    ->orWhere('storage', 'like', "%{$search}%")
                    ->orWhere('vga', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.laptops.index', compact('laptops', 'search'));
    }

    public function create(): View
    {
        return view('admin.laptops.create', [
            'brands' => Brand::orderBy('brand_name')->get(),
            'categories' => Category::orderBy('category_name')->get(),
        ]);
    }

    public function store(StoreLaptopRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('laptops', 'public');
        }

        Laptop::create($data);

        return redirect()->route('admin.laptops.index')->with('success', 'Laptop berhasil ditambahkan.');
    }

    public function show(Laptop $laptop): View
    {
        $laptop->load(['brand', 'category']);

        return view('admin.laptops.show', compact('laptop'));
    }

    public function edit(Laptop $laptop): View
    {
        return view('admin.laptops.edit', [
            'laptop' => $laptop,
            'brands' => Brand::orderBy('brand_name')->get(),
            'categories' => Category::orderBy('category_name')->get(),
        ]);
    }

    public function update(UpdateLaptopRequest $request, Laptop $laptop): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($laptop->image) {
                Storage::disk('public')->delete($laptop->image);
            }

            $data['image'] = $request->file('image')->store('laptops', 'public');
        }

        $laptop->update($data);

        return redirect()->route('admin.laptops.index')->with('success', 'Laptop berhasil diperbarui.');
    }

    public function destroy(Laptop $laptop): RedirectResponse
    {
        if ($laptop->image) {
            Storage::disk('public')->delete($laptop->image);
        }

        $laptop->delete();

        return redirect()->route('admin.laptops.index')->with('success', 'Laptop berhasil dihapus.');
    }
}
