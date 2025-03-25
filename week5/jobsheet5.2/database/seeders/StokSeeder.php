<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StokSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'barang_id' => $i,
                'user_id' => rand(1, 3),
                'stok_tanggal' => Carbon::now()->subDays(rand(1, 30)),
                'stok_jumlah' => rand(10, 100),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('t_stok')->insert($data);
    }
}
