<?php

namespace Database\Seeders;

use App\Models\SupplierModel;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       SupplierModel::factory()->count(10)->create();
    }
}
