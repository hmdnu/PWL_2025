<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['kategori_kode' => 'ELEC', 'kategori_nama' => 'Elektronik'],
            ['kategori_kode' => 'FASH', 'kategori_nama' => 'Fashion'],
            ['kategori_kode' => 'FOOD', 'kategori_nama' => 'Makanan'],
            ['kategori_kode' => 'BOOK', 'kategori_nama' => 'Buku'],
            ['kategori_kode' => 'TOY', 'kategori_nama' => 'Mainan'],
        ];

        foreach ($data as &$item) {
            $item['created_at'] = Carbon::now();
            $item['updated_at'] = Carbon::now();
        }

        DB::table('m_kategori')->insert($data);
    }
}
