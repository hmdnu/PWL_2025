<!DOCTYPE html>
<html>
<head>
    <title>Daftar Item</title>
</head>
<body>
    <h1>Daftar Item</h1>

    <!-- Menampilkan notifikasi sukses jika ada, misalnya setelah item ditambahkan, diperbarui, atau dihapus -->
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <!-- Tombol untuk menambahkan item baru, mengarah ke halaman form penambahan -->
    <a href="{{ route('items.create') }}">Tambah Item</a>

    <ul>
        <!-- Melakukan perulangan untuk menampilkan semua item yang diterima dari ItemController -->
        @foreach ($items as $item)
        <li>
            <!-- Menampilkan nama item -->
            {{ $item->name }} -

            <!-- Link untuk mengedit item -->
            <a href="{{ route('items.edit', $item) }}">Ubah</a>

            <!-- Form untuk menghapus item -->
            <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
                @csrf               <!-- Menambahkan token keamanan untuk mencegah serangan CSRF -->
                @method('DELETE')   <!-- Menentukan method DELETE sesuai standar RESTful -->
                <button type="submit">Hapus</button>
            </form>
        </li>
        @endforeach
    </ul>
</body>
</html>
