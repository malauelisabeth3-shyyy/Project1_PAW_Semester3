@extends('layouts.app')
@section('title', 'Transaksi Penjualan')

@section('content')
<div>
    <h4>Transaksi Penjualan</h4>
    <a href="{{ route('transactions.create') }}">+ Transaksi Baru</a>
</div>

<div>
    <table border="1" cellpadding="6" cellspacing="0">
        <thead><tr><th>Invoice</th><th>Tanggal</th><th>Produk</th><th>Qty</th><th>Harga</th><th>Total</th><th>Kasir</th><th>Aksi</th></tr></thead>
        <tbody>
        @forelse ($transactions as $t)
            <tr>
                <td>{{ $t->invoice_no }}</td>
                <td>{{ $t->transaction_date->format('d/m/Y') }}</td>
                <td>{{ $t->product->name }}</td>
                <td>{{ $t->quantity }}</td>
                <td>Rp {{ number_format($t->unit_price, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($t->total_price, 0, ',', '.') }}</td>
                <td>{{ $t->user->name }}</td>
                <td>
                    <a href="{{ route('transactions.edit', $t) }}">Edit</a>
                    <form action="{{ route('transactions.destroy', $t) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus transaksi ini? Stok akan dikembalikan.')">
                        @csrf @method('DELETE')
                        <button>Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="8">Belum ada transaksi.</td></tr>
        @endforelse
        </tbody>
    </table>
    <div>{{ $transactions->links() }}</div>
</div>
@endsection
