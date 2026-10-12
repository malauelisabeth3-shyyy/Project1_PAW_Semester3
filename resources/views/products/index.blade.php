@extends('layouts.app')
@section('title', 'Produk')

@section('content')
<div>
    <h4>Data Produk</h4>
    <a href="{{ route('products.create') }}">+ Tambah Produk</a>
</div>

<form method="GET" style="margin-bottom:12px">
    <div>
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama / kode produk...">
        <button>Cari</button>
    </div>
</form>

<div>
    <table border="1" cellpadding="6" cellspacing="0">
        <thead><tr><th>Kode</th><th>Nama</th><th>Kategori</th><th>Supplier</th><th>Harga</th><th>Stok</th><th>Aksi</th></tr></thead>
        <tbody>
        @forelse ($products as $p)
            <tr>
                <td>{{ $p->code }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->category->name }}</td>
                <td>{{ $p->supplier->name }}</td>
                <td>Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                <td><span>{{ $p->stock }}</span></td>
                <td>
                    <a href="{{ route('products.edit', $p) }}">Edit</a>
                    <form action="{{ route('products.destroy', $p) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus produk ini?')">
                        @csrf @method('DELETE')
                        <button>Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="7">Belum ada data.</td></tr>
        @endforelse
        </tbody>
    </table>
    <div>{{ $products->links() }}</div>
</div>
@endsection
