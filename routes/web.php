<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LaptopController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(LandingPageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/laptops', 'laptops')->name('laptops.index');
    Route::get('/laptops/{laptop}', 'showLaptop')->name('laptops.show');
    Route::get('/brands', 'brands')->name('brands.index');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
});

Route::get('/dashboard', function () {
    return auth()->user()?->isAdmin()
        ? redirect()->route('admin.dashboard')
        : redirect()->route('home');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('brands', BrandController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('laptops', LaptopController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('transactions', TransactionController::class)->except(['edit', 'update']);
});

require __DIR__.'/auth.php';
