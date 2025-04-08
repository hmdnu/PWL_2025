<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['level_id' => 1, 'level_code' => 'ADM', 'level_name' => 'administrator'],
            ['level_id' => 2, 'level_code' => 'MNG', 'level_name' => 'manager'],
            ['level_id' => 3, 'level_code' => 'STF', 'level_name' => 'staff/cashier'],
        ];

        DB::table('level')->insert($data);
    }
}
