<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanDetailSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];

        for ($penjualan_id = 1; $penjualan_id <= 10; $penjualan_id++) {
            for ($i = 0; $i < 3; $i++) { // Each transaction has 3 items
                $barang_id = rand(1, 10);
                $harga = rand(5000, 50000);
                $jumlah = rand(1, 5);

                $data[] = [
                    'penjualan_id' => $penjualan_id,
                    'barang_id' => $barang_id,
                    'harga' => $harga,
                    'jumlah' => $jumlah,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
        }

        DB::table('t_penjualan_detail')->insert($data);
    }
}
