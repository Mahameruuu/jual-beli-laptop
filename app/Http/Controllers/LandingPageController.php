<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Laptop;
use Illuminate\Contracts\View\View;

class LandingPageController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            'featuredLaptops' => Laptop::with(['brand', 'category'])->latest()->take(6)->get(),
            'brands' => Brand::latest()->get(),
            'laptopCount' => Laptop::count(),
            'brandCount' => Brand::count(),
        ]);
    }

    public function laptops(): View
    {
        return view('pages.laptops.index', [
            'laptops' => Laptop::with(['brand', 'category'])->latest()->paginate(9),
        ]);
    }

    public function showLaptop(Laptop $laptop): View
    {
        $laptop->load(['brand', 'category']);

        return view('pages.laptops.show', [
            'laptop' => $laptop,
            'relatedLaptops' => Laptop::with(['brand', 'category'])
                ->where('category_id', $laptop->category_id)
                ->whereKeyNot($laptop->id)
                ->latest()
                ->take(3)
                ->get(),
        ]);
    }

    public function brands(): View
    {
        return view('pages.brands.index', [
            'brands' => Brand::withCount('laptops')->orderBy('brand_name')->get(),
        ]);
    }

    public function about(): View
    {
        return view('pages.about');
    }

    public function contact(): View
    {
        return view('pages.contact');
    }
}
