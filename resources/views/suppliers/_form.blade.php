<div style="margin-bottom:12px">
    <label>Nama Supplier</label><br>
    <input type="text" name="name" value="{{ old('name', $supplier->name ?? '') }}">
    @error('name') <small style="color:red">{{ $message }}</small> @enderror
</div>
<div>
    <div style="margin-bottom:12px">
        <label>Telepon</label><br>
        <input type="text" name="phone" value="{{ old('phone', $supplier->phone ?? '') }}">
        @error('phone') <small style="color:red">{{ $message }}</small> @enderror
    </div>
    <div style="margin-bottom:12px">
        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email', $supplier->email ?? '') }}">
        @error('email') <small style="color:red">{{ $message }}</small> @enderror
    </div>
</div>
<div style="margin-bottom:12px">
    <label>Alamat</label><br>
    <textarea name="address" rows="3">{{ old('address', $supplier->address ?? '') }}</textarea>
</div>
<button>Simpan</button>
<a href="{{ route('suppliers.index') }}">Batal</a>
