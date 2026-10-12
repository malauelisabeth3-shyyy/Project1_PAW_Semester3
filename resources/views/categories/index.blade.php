@extends('layouts.app')
@section('title', 'Kategori Produk')

@section('content')
<div>
    <h4>Kategori Produk</h4>
    <a href="{{ route('categories.create') }}">+ Tambah Kategori</a>
</div>

<div>
    <table border="1" cellpadding="6" cellspacing="0">
        <thead><tr><th>#</th><th>Nama</th><th>Deskripsi</th><th>Jumlah Produk</th><th>Aksi</th></tr></thead>
        <tbody>
        @forelse ($categories as $c)
            <tr>
                <td>{{ $categories->firstItem() + $loop->index }}</td>
                <td>{{ $c->name }}</td>
                <td>{{ $c->description ?? '-' }}</td>
                <td>{{ $c->products_count }}</td>
                <td>
                    <a href="{{ route('categories.edit', $c) }}">Edit</a>
                    <form action="{{ route('categories.destroy', $c) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus kategori ini?')">
                        @csrf @method('DELETE')
                        <button>Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">Belum ada data.</td></tr>
        @endforelse
        </tbody>
    </table>
    <div>{{ $categories->links() }}</div>
</div>
@endsection
