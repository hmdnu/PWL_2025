<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SalesDetailSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];

        for ($sales_id = 1; $sales_id <= 10; $sales_id++) {
            for ($i = 0; $i < 3; $i++) { // Each transaction has 3 items
                $item_id = rand(1, 10);
                $price = rand(5000, 50000);
                $amount = rand(1, 5);

                $data[] = [
                    'sales_id' => $sales_id,
                    'item_id' => $item_id,
                    'price' => $price,
                    'amount' => $amount,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
        }

        DB::table('sales_detail')->insert($data);
    }
}
