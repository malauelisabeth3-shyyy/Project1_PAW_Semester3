<div>
    <div style="margin-bottom:12px">
        <label>Kode Produk</label><br>
        <input type="text" name="code" value="{{ old('code', $product->code ?? '') }}">
        @error('code') <small style="color:red">{{ $message }}</small> @enderror
    </div>
    <div style="margin-bottom:12px">
        <label>Nama Produk</label><br>
        <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}">
        @error('name') <small style="color:red">{{ $message }}</small> @enderror
    </div>
</div>
<div>
    <div style="margin-bottom:12px">
        <label>Kategori</label><br>
        <select name="category_id">
            <option value="">-- Pilih kategori --</option>
            @foreach ($categories as $c)
                <option value="{{ $c->id }}" @selected(old('category_id', $product->category_id ?? '') == $c->id)>{{ $c->name }}</option>
            @endforeach
        </select>
        @error('category_id') <small style="color:red">{{ $message }}</small> @enderror
    </div>
    <div style="margin-bottom:12px">
        <label>Supplier</label><br>
        <select name="supplier_id">
            <option value="">-- Pilih supplier --</option>
            @foreach ($suppliers as $s)
                <option value="{{ $s->id }}" @selected(old('supplier_id', $product->supplier_id ?? '') == $s->id)>{{ $s->name }}</option>
            @endforeach
        </select>
        @error('supplier_id') <small style="color:red">{{ $message }}</small> @enderror
    </div>
</div>
<div>
    <div style="margin-bottom:12px">
        <label>Harga (Rp)</label><br>
        <input type="number" name="price" min="0" value="{{ old('price', isset($product) ? (int) $product->price : '') }}">
        @error('price') <small style="color:red">{{ $message }}</small> @enderror
    </div>
    <div style="margin-bottom:12px">
        <label>Stok</label><br>
        <input type="number" name="stock" min="0" value="{{ old('stock', $product->stock ?? 0) }}">
        @error('stock') <small style="color:red">{{ $message }}</small> @enderror
    </div>
</div>
<button>Simpan</button>
<a href="{{ route('products.index') }}">Batal</a>
