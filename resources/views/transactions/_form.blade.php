<div style="margin-bottom:12px">
    <label>Produk</label><br>
    <select name="product_id">
        <option value="">-- Pilih produk --</option>
        @foreach ($products as $p)
            <option value="{{ $p->id }}" @selected(old('product_id', $transaction->product_id ?? '') == $p->id)>
                {{ $p->code }} - {{ $p->name }} (Rp {{ number_format($p->price, 0, ',', '.') }} | stok {{ $p->stock }})
            </option>
        @endforeach
    </select>
    @error('product_id') <small style="color:red">{{ $message }}</small> @enderror
</div>
<div>
    <div style="margin-bottom:12px">
        <label>Jumlah</label><br>
        <input type="number" name="quantity" min="1" value="{{ old('quantity', $transaction->quantity ?? 1) }}">
        @error('quantity') <small style="color:red">{{ $message }}</small> @enderror
    </div>
    <div style="margin-bottom:12px">
        <label>Tanggal Transaksi</label><br>
        <input type="date" name="transaction_date" value="{{ old('transaction_date', isset($transaction) ? $transaction->transaction_date->format('Y-m-d') : now()->format('Y-m-d')) }}">
        @error('transaction_date') <small style="color:red">{{ $message }}</small> @enderror
    </div>
</div>
<button>Simpan</button>
<a href="{{ route('transactions.index') }}">Batal</a>
