<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SalesSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'user_id' => rand(1, 3),
                'buyer' => 'Pembeli ' . $i,
                'sales_code' => 'TRX' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'sales_date' => Carbon::now()->subDays(rand(1, 30)),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('sales')->insert($data);
    }
}
