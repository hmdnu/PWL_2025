<?php

namespace Database\Seeders;

use App\Models\SalesModel;
use Illuminate\Database\Seeder;

class SalesSeeder extends Seeder
{
    public function run(): void
    {
        SalesModel::factory()->count(10)->create();
    }
}
