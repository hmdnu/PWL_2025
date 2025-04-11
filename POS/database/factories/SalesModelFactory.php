<?php

namespace Database\Factories;

use App\Models\UserModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SalesModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => UserModel::query()->inRandomOrder()->first()->user_id,
            'buyer' => $this->faker->name(),
            'sales_code' => $this->faker->randomNumber(9),
            'sales_date' => $this->faker->date(),
        ];
    }
}
