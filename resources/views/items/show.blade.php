<!DOCTYPE html>
<html>
<head>
    <title>Detail Item</title>
</head>
<body>
    <h1>Detail Item</h1>

    <!-- Menampilkan nama item -->
    <p><strong>Nama:</strong> {{ $item->name }}</p>

    <!-- Menampilkan deskripsi item -->
    <p><strong>Deskripsi:</strong> {{ $item->description }}</p>

    <!-- Tautan untuk mengedit item ini -->
    <a href="{{ route('items.edit', $item) }}">Ubah</a>

    <!-- Form untuk menghapus item ini -->
    <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
        @csrf <!-- Token keamanan untuk melindungi dari serangan CSRF -->
        @method('DELETE') <!-- Menggunakan metode DELETE untuk menghapus data sesuai standar RESTful -->
        <button type="submit">Hapus</button>
    </form>

    <!-- Tautan untuk kembali ke daftar item -->
    <a href="{{ route('items.index') }}">Kembali ke Daftar</a>
</body>
</html>
