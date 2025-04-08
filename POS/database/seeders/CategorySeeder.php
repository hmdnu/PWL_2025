<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['category_code' => 'ELEC', 'category_name' => 'electronic'],
            ['category_code' => 'FASH', 'category_name' => 'fashion'],
            ['category_code' => 'FOOD', 'category_name' => 'food'],
            ['category_code' => 'BOOK', 'category_name' => 'book'],
            ['category_code' => 'TOY', 'category_name' => 'toy'],
        ];

        foreach ($data as &$item) {
            $item['created_at'] = Carbon::now();
            $item['updated_at'] = Carbon::now();
        }

        DB::table('category')->insert($data);
    }
}
