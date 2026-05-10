<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\Laptop;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'totalBrands' => Brand::count(),
            'totalCustomers' => Customer::count(),
            'totalLaptops' => Laptop::count(),
            'totalTransactions' => Transaction::count(),
            'recentTransactions' => Transaction::with('customer')->latest()->take(5)->get(),
        ]);
    }
}
