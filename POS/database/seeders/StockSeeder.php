<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StockSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'item_id' => $i,
                'user_id' => rand(1, 3),
                'stocked_date' => Carbon::now()->subDays(rand(1, 30)),
                'stock_amount' => rand(10, 100),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('stock')->insert($data);
    }
}
