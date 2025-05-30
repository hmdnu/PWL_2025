<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    //
    public function index()
    {
        // $data = [
        //     'kategori_kode' => 'SNK',
        //     'kategori_nama' => 'snack/makanan ringan',
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ];

        // DB::table('m_kategori')->insert($data);
        // return 'insert data baru berhasil';

        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'camilan']);
        // return 'update data berhasil ' . $row;

        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
        // return 'delete data berhasil ' . $row;
        $data = DB::table('m_kategori')->get();
        return view('kategori', ['data' => $data]);
    }
}
