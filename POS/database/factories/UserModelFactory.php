<?php

namespace Database\Factories;

use App\Models\LevelModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<User>
 */
class UserModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "level_id" => LevelModel::query()->inRandomOrder()->first()?->level_id ,
            "username" => $this->faker->userName(),
            "name" => $this->faker->name(),
            "password" => Hash::make('12345'),
        ];
    }
}
