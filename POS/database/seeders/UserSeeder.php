<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'no_induk' => '123',
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'role' => 'admin',
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'no_induk' => '456',
                'name' => 'user',
                'email' => 'user@user.com',
                'role' => 'tenant',
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('users')->insert($data);

        User::factory()->count(2)->create([
            'role' => 'admin'
        ]);
        User::factory()->count(5)->create([
            'role' => 'tenant'
        ]);
    }
}
