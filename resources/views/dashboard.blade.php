@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<h3>Dashboard</h3>

<ul>
    <li>Penjualan Hari Ini: Rp {{ number_format($todaySales, 0, ',', '.') }}</li>
    <li>Total Produk: {{ $totalProducts }}</li>
    <li>Total Kategori: {{ $totalCategories }}</li>
    <li>Total Supplier: {{ $totalSuppliers }}</li>
</ul>

<h4>Transaksi Terbaru</h4>
<table border="1" cellpadding="6" cellspacing="0">
    <thead><tr><th>Invoice</th><th>Produk</th><th>Qty</th><th>Total</th></tr></thead>
    <tbody>
    @forelse ($latest as $t)
        <tr>
            <td>{{ $t->invoice_no }}</td>
            <td>{{ $t->product->name }}</td>
            <td>{{ $t->quantity }}</td>
            <td>Rp {{ number_format($t->total_price, 0, ',', '.') }}</td>
        </tr>
    @empty
        <tr><td colspan="4">Belum ada transaksi.</td></tr>
    @endforelse
    </tbody>
</table>

<h4>Stok Menipis (&le; 10)</h4>
<ul>
    @forelse ($lowStock as $p)
        <li>{{ $p->name }} - stok {{ $p->stock }}</li>
    @empty
        <li>Semua stok aman.</li>
    @endforelse
</ul>
@endsection
