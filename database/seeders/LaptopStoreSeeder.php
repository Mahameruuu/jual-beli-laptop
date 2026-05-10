<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Laptop;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LaptopStoreSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@laptopstore.test'],
            [
                'name' => 'Admin Laptop Store',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        User::factory()->count(3)->create();

        $brands = collect(['ASUS', 'Acer', 'Lenovo', 'HP', 'MSI', 'Dell'])
            ->map(fn (string $name) => Brand::create(['brand_name' => $name]));

        $categories = collect(['Gaming', 'Office', 'Student', 'Content Creator'])
            ->map(fn (string $name) => Category::create(['category_name' => $name]));

        $laptops = collect([
            [
                'brand' => 'ASUS',
                'category' => 'Gaming',
                'laptop_name' => 'ASUS ROG Strix G16',
                'processor' => 'Intel Core i7',
                'ram' => '16GB',
                'storage' => '1TB SSD',
                'vga' => 'RTX 4060',
                'price' => 22000000,
                'stock' => 10,
                'description' => 'Laptop gaming performa tinggi dengan pendinginan agresif dan layar responsif.',
            ],
            [
                'brand' => 'Lenovo',
                'category' => 'Office',
                'laptop_name' => 'Lenovo IdeaPad Slim 3',
                'processor' => 'Intel Core i5',
                'ram' => '8GB',
                'storage' => '512GB SSD',
                'vga' => 'Intel Iris Xe',
                'price' => 8500000,
                'stock' => 15,
                'description' => 'Laptop office dan kuliah dengan desain tipis untuk mobilitas harian.',
            ],
            [
                'brand' => 'Acer',
                'category' => 'Gaming',
                'laptop_name' => 'Acer Nitro 5',
                'processor' => 'AMD Ryzen 7',
                'ram' => '16GB',
                'storage' => '512GB SSD',
                'vga' => 'RTX 4050',
                'price' => 17000000,
                'stock' => 7,
                'description' => 'Laptop gaming terjangkau untuk esports dan editing ringan.',
            ],
            [
                'brand' => 'HP',
                'category' => 'Student',
                'laptop_name' => 'HP Pavilion 14',
                'processor' => 'Intel Core i5',
                'ram' => '16GB',
                'storage' => '512GB SSD',
                'vga' => 'Intel Iris Xe',
                'price' => 10800000,
                'stock' => 12,
                'description' => 'Nyaman untuk tugas kuliah, meeting online, dan produktivitas multitasking.',
            ],
            [
                'brand' => 'MSI',
                'category' => 'Content Creator',
                'laptop_name' => 'MSI Creator M16',
                'processor' => 'Intel Core i7',
                'ram' => '16GB',
                'storage' => '1TB SSD',
                'vga' => 'RTX 4050',
                'price' => 19800000,
                'stock' => 8,
                'description' => 'Didesain untuk workflow desain, rendering, dan produksi konten.',
            ],
            [
                'brand' => 'Dell',
                'category' => 'Office',
                'laptop_name' => 'Dell Inspiron 14',
                'processor' => 'Intel Core i5',
                'ram' => '8GB',
                'storage' => '512GB SSD',
                'vga' => 'Intel UHD Graphics',
                'price' => 9600000,
                'stock' => 9,
                'description' => 'Laptop bisnis simpel dengan build quality rapi dan baterai stabil.',
            ],
        ])->map(function (array $item) use ($brands, $categories) {
            return Laptop::create([
                'brand_id' => $brands->firstWhere('brand_name', $item['brand'])->id,
                'category_id' => $categories->firstWhere('category_name', $item['category'])->id,
                'laptop_name' => $item['laptop_name'],
                'processor' => $item['processor'],
                'ram' => $item['ram'],
                'storage' => $item['storage'],
                'vga' => $item['vga'],
                'price' => $item['price'],
                'stock' => $item['stock'],
                'description' => $item['description'],
            ]);
        });

        $customers = collect([
            ['customer_name' => 'Budi Santoso', 'phone' => '08123456789', 'address' => 'Surabaya'],
            ['customer_name' => 'Andi Wijaya', 'phone' => '08234567891', 'address' => 'Sidoarjo'],
        ])->map(fn (array $customer) => Customer::create($customer));

        $firstTransaction = Transaction::create([
            'customer_id' => $customers->first()->id,
            'transaction_date' => now()->toDateString(),
            'total_price' => 22000000,
            'status' => 'paid',
        ]);

        $firstTransaction->details()->create([
            'laptop_id' => $laptops->firstWhere('laptop_name', 'ASUS ROG Strix G16')->id,
            'quantity' => 1,
            'price' => 22000000,
            'subtotal' => 22000000,
        ]);
        $laptops->firstWhere('laptop_name', 'ASUS ROG Strix G16')->decrement('stock', 1);

        $secondTransaction = Transaction::create([
            'customer_id' => $customers->last()->id,
            'transaction_date' => now()->toDateString(),
            'total_price' => 17000000,
            'status' => 'pending',
        ]);

        $secondTransaction->details()->create([
            'laptop_id' => $laptops->firstWhere('laptop_name', 'Acer Nitro 5')->id,
            'quantity' => 1,
            'price' => 17000000,
            'subtotal' => 17000000,
        ]);
        $laptops->firstWhere('laptop_name', 'Acer Nitro 5')->decrement('stock', 1);
    }
}
