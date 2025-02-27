<?php

// Namespace untuk menentukan lokasi dari controller
namespace App\Http\Controllers;

// Menggunakan model Item
use App\Models\Item;
// Menggunakan Request untuk menangani input dari form
use Illuminate\Http\Request;

// Mendefinisikan class ItemController yang mewarisi Controller bawaan Laravel
class ItemController extends Controller
{
    // Method index untuk menampilkan semua item yang tersimpan di database
    public function index()
    {
        $items = Item::All(); // Mengambil seluruh data item dari tabel 'items'
        return view("item.index", compact("items")); // Mengirim data item ke tampilan item.index
    }

    // Method create untuk menampilkan halaman form penambahan item baru
    public function create()
    {
        return view("item.create"); // Mengarahkan ke tampilan form pembuatan item baru
    }

    // Method store untuk menyimpan item baru ke dalam database
    public function store(Request $request)
    {
        // Melakukan validasi input
        $request->validate([
            "name" => "required", // Nama harus diisi
            "description" => "required", // Deskripsi harus diisi
        ]);

        // Menyimpan item baru ke dalam database
        Item::create($request->only(["name", "description"])); // Menyimpan hanya field name dan description

        // Mengarahkan kembali ke halaman index dengan pesan sukses
        return redirect()
            ->route("items.index")
            ->with("success", "Item berhasil ditambahkan");
    }

    // Method show untuk menampilkan detail dari item tertentu
    // Parameter $item akan otomatis diambil melalui Route Model Binding
    public function show(Item $item)
    {
        return view("item.show", compact("item")); // Mengirim data item ke tampilan item.show
    }

    // Method edit untuk menampilkan halaman form edit item yang dipilih
    public function edit(Item $item)
    {
        return view("item.edit", compact("item")); // Mengirim data item ke tampilan item.edit
    }

    // Method update untuk memperbarui data item di dalam database
    public function update(Request $request, Item $item)
    {
        // Melakukan validasi input
        $request->validate([
            "name" => "required", // Nama harus diisi
            "description" => "required", // Deskripsi harus diisi
        ]);

        // Memperbarui data item yang dipilih
        $item->update($request->only(["name", "description"])); // Memperbarui name dan description

        // Mengarahkan kembali ke halaman index dengan pesan sukses
        return redirect()
            ->route("items.index")
            ->with("success", "Item berhasil diperbarui");
    }

    // Method destroy untuk menghapus item dari database
    public function destroy(Item $item)
    {
        $item->delete(); // Menghapus item yang dipilih dari database

        // Mengarahkan kembali ke halaman index dengan pesan sukses
        return redirect()
            ->route("items.index")
            ->with("success", "Item berhasil dihapus");
    }
}
