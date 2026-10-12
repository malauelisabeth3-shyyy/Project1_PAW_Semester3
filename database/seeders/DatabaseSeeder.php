<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'gefr@kasir.test'],
            ['name' => 'Gifel Chelsy', 'password' => Hash::make('redvelvet')]
        );

        $minuman = Category::firstOrCreate(['name' => 'Minuman'], ['description' => 'Air mineral, teh, kopi, dll']);
        $snack   = Category::firstOrCreate(['name' => 'Makanan Ringan'], ['description' => 'Snack dan biskuit']);
        $sembako = Category::firstOrCreate(['name' => 'Sembako'], ['description' => 'Beras, minyak, gula, dll']);

        $supplier = Supplier::firstOrCreate(
            ['name' => 'PT Sumber Makmur'],
            ['phone' => '081234567890', 'email' => 'sales@sumbermakmur.test', 'address' => 'Malang, Jawa Timur']
        );

        // [kode, nama, kategori, harga, stok]
        $products = [
            ['PRD-001', 'Air Mineral 600ml', $minuman, 4000, 100],
            ['PRD-002', 'Keripik Kentang', $snack, 12000, 50],
            ['PRD-003', 'Teh Botol 450ml', $minuman, 5000, 60],
            ['PRD-004', 'Kopi Sachet', $minuman, 2500, 120],
            ['PRD-005', 'Biskuit Cokelat', $snack, 8000, 40],
            ['PRD-006', 'Mie Instan Goreng', $sembako, 3500, 200],
            ['PRD-007', 'Beras 5kg', $sembako, 68000, 25],
            ['PRD-008', 'Minyak Goreng 1L', $sembako, 18000, 30],
            ['PRD-009', 'Gula Pasir 1kg', $sembako, 16000, 35],
        ];

        foreach ($products as [$code, $name, $category, $price, $stock]) {
            Product::updateOrCreate(
                ['code' => $code], // kunci pencarian, jadi aman dijalankan berulang kali
                [
                    'name' => $name,
                    'category_id' => $category->id,
                    'supplier_id' => $supplier->id,
                    'price' => $price,
                    'stock' => $stock,
                ]
            );
        }
    }
}