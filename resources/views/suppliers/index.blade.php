@extends('layouts.app')
@section('title', 'Supplier')

@section('content')
<div>
    <h4>Data Supplier</h4>
    <a href="{{ route('suppliers.create') }}">+ Tambah Supplier</a>
</div>

<div>
    <table border="1" cellpadding="6" cellspacing="0">
        <thead><tr><th>#</th><th>Nama</th><th>Telepon</th><th>Email</th><th>Alamat</th><th>Produk</th><th>Aksi</th></tr></thead>
        <tbody>
        @forelse ($suppliers as $s)
            <tr>
                <td>{{ $suppliers->firstItem() + $loop->index }}</td>
                <td>{{ $s->name }}</td>
                <td>{{ $s->phone }}</td>
                <td>{{ $s->email ?? '-' }}</td>
                <td>{{ $s->address ?? '-' }}</td>
                <td>{{ $s->products_count }}</td>
                <td>
                    <a href="{{ route('suppliers.edit', $s) }}">Edit</a>
                    <form action="{{ route('suppliers.destroy', $s) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus supplier ini?')">
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
    <div>{{ $suppliers->links() }}</div>
</div>
@endsection
