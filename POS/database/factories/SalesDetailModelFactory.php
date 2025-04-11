<?php

namespace Database\Factories;

use App\Models\ItemModel;
use App\Models\SalesModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SalesDetailModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sales_id' => SalesModel::query()->inRandomOrder()->first()->sales_id,
            'item_id' => ItemModel::query()->inRandomOrder()->first()->item_id,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'amount' => $this->faker->randomNumber(),
        ];
    }
}
