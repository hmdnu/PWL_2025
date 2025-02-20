<!DOCTYPE html>
<html>
<head>
    <title>Ubah Item</title>
</head>
<body>
    <h1>Ubah Item</h1>

    <!-- Form untuk memperbarui data item yang sudah ada -->
    <form action="{{ route('items.update', $item) }}" method="POST">
        @csrf <!-- Token keamanan untuk melindungi dari serangan CSRF -->
        @method('PUT') <!-- Menggunakan metode PUT untuk memperbarui data sesuai standar RESTful -->

        <!-- Input untuk nama item, dengan nilai default dari data yang sudah ada -->
        <label for="name">Nama:</label>
        <input type="text" name="name" value="{{ $item->name }}" required>
        <br>

        <!-- Input untuk deskripsi item, dengan nilai default dari data yang sudah ada -->
        <label for="description">Deskripsi:</label>
        <textarea name="description" required>{{ $item->description }}</textarea>
        <br>

        <!-- Tombol untuk menyimpan perubahan item -->
        <button type="submit">Simpan Perubahan</button>
    </form>

    <!-- Tautan untuk kembali ke daftar item -->
    <a href="{{ route('items.index') }}">Kembali ke Daftar</a>
</body>
</html>
