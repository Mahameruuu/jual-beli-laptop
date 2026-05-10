<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionRequest;
use App\Models\Customer;
use App\Models\Laptop;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index(): View
    {
        return view('admin.transactions.index', [
            'transactions' => Transaction::with(['customer', 'details.laptop'])->latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.transactions.create', [
            'customers' => Customer::orderBy('customer_name')->get(),
            'laptops' => Laptop::with(['brand', 'category'])->where('stock', '>', 0)->orderBy('laptop_name')->get(),
        ]);
    }

    public function store(StoreTransactionRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        DB::transaction(function () use ($validated) {
            $items = collect($validated['items']);
            $laptops = Laptop::whereIn('id', $items->pluck('laptop_id'))->get()->keyBy('id');
            $totalPrice = 0;

            foreach ($items as $item) {
                $laptop = $laptops[$item['laptop_id']];

                if ($validated['status'] !== 'cancelled' && $laptop->stock < $item['quantity']) {
                    abort(422, "Stok {$laptop->laptop_name} tidak mencukupi.");
                }

                $totalPrice += $laptop->price * $item['quantity'];
            }

            $transaction = Transaction::create([
                'customer_id' => $validated['customer_id'],
                'transaction_date' => $validated['transaction_date'],
                'total_price' => $totalPrice,
                'status' => $validated['status'],
            ]);

            foreach ($items as $item) {
                $laptop = $laptops[$item['laptop_id']];
                $subtotal = $laptop->price * $item['quantity'];

                $transaction->details()->create([
                    'laptop_id' => $laptop->id,
                    'quantity' => $item['quantity'],
                    'price' => $laptop->price,
                    'subtotal' => $subtotal,
                ]);

                if ($validated['status'] !== 'cancelled') {
                    $laptop->decrement('stock', $item['quantity']);
                }
            }
        });

        return redirect()->route('admin.transactions.index')->with('success', 'Transaksi berhasil dibuat.');
    }

    public function show(Transaction $transaction): View
    {
        $transaction->load(['customer', 'details.laptop.brand']);

        return view('admin.transactions.show', compact('transaction'));
    }

    public function destroy(Transaction $transaction): RedirectResponse
    {
        DB::transaction(function () use ($transaction) {
            $transaction->load('details.laptop');

            if ($transaction->status !== 'cancelled') {
                foreach ($transaction->details as $detail) {
                    $detail->laptop?->increment('stock', $detail->quantity);
                }
            }

            $transaction->delete();
        });

        return redirect()->route('admin.transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
