<?php

namespace Database\Seeders;

use App\Models\ItemModel;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
      ItemModel::factory()->count(10)->create();
    }
}
