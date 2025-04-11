<?php

namespace Database\Factories;

use App\Models\ItemModel;
use App\Models\UserModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StockModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'item_id' => ItemModel::query()->inRandomOrder()->first()->item_id,
            'user_id' => UserModel::query()->inRandomOrder()->first()->user_id,
            'stocked_date' => $this->faker->date(),
            'stock_amount' => $this->faker->randomNumber(2),
        ];
    }
}
