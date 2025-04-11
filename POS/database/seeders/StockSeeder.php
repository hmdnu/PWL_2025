<?php

namespace Database\Seeders;

use App\Models\StockModel;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    public function run(): void
    {
        StockModel::factory()->count(10)->create();
    }
}
