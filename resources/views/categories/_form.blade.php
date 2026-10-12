<div style="margin-bottom:12px">
    <label>Nama Kategori</label><br>
    <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}">
    @error('name') <small style="color:red">{{ $message }}</small> @enderror
</div>
<div style="margin-bottom:12px">
    <label>Deskripsi</label><br>
    <textarea name="description" rows="3">{{ old('description', $category->description ?? '') }}</textarea>
</div>
<button>Simpan</button>
<a href="{{ route('categories.index') }}">Batal</a>
