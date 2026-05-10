<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{
    public function index(): View
    {
        return view('admin.customers.index', [
            'customers' => Customer::latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.customers.create');
    }

    public function store(StoreCustomerRequest $request): RedirectResponse
    {
        Customer::create($request->validated());

        return redirect()->route('admin.customers.index')->with('success', 'Customer berhasil ditambahkan.');
    }

    public function show(Customer $customer): RedirectResponse
    {
        return redirect()->route('admin.customers.edit', $customer);
    }

    public function edit(Customer $customer): View
    {
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, Customer $customer): RedirectResponse
    {
        $customer->update($request->validated());

        return redirect()->route('admin.customers.index')->with('success', 'Customer berhasil diperbarui.');
    }

    public function destroy(Customer $customer): RedirectResponse
    {
        $customer->delete();

        return redirect()->route('admin.customers.index')->with('success', 'Customer berhasil dihapus.');
    }
}
