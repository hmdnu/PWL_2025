<?php

namespace Database\Seeders;

use App\Models\CategoryModel;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        CategoryModel::factory()->count(5)->create();
    }
}
