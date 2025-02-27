<!DOCTYPE html>
<html>
<head>
    <title>Tambah Item</title>
</head>
<body>
    <h1>Tambah Item</h1>

    <!-- Form untuk memasukkan item baru -->
    <form action="{{ route('items.store') }}" method="POST">
        @csrf <!-- Token keamanan untuk mencegah serangan CSRF -->

        <!-- Input untuk nama item -->
        <label for="name">Nama: </label>
        <input type="text" name="name" required>
        <br>

        <!-- Input untuk deskripsi item -->
        <label for="description">Deskripsi: </label>
        <textarea name="description" required></textarea>
        <br>

        <!-- Tombol untuk menyimpan item baru -->
        <button type="submit">Simpan Item</button>
    </form>

    <!-- Tautan untuk kembali ke halaman daftar item -->
    <a href="{{ route('items.index') }}">Kembali ke Daftar</a>
</body>
</html>
