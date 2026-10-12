<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalProducts'   => Product::count(),
            'totalCategories' => Category::count(),
            'totalSuppliers'  => Supplier::count(),
            'todaySales'      => Transaction::whereDate('transaction_date', today())->sum('total_price'),
            'latest'          => Transaction::with('product')->latest()->take(5)->get(),
            'lowStock'        => Product::where('stock', '<=', 10)->orderBy('stock')->take(5)->get(),
        ]);
    }
}
