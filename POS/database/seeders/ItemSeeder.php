<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'category_id' => rand(1, 5),
                'item_code' => 'BRG' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'item_name' => 'Barang ' . $i,
                'buy_price' => rand(10000, 50000),
                'sell_price' => rand(50000, 100000),
                'created_at' => Carbon::now(),
                'uploaded_at' => Carbon::now(),
            ];
        }

        DB::table('item')->insert($data);
    }
}
