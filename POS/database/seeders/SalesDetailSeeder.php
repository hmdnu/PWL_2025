<?php

namespace Database\Seeders;

use App\Models\SalesDetailModel;
use Illuminate\Database\Seeder;

class SalesDetailSeeder extends Seeder
{
    public function run(): void
    {
        SalesDetailModel::factory()->count(10)->create();
    }
}
