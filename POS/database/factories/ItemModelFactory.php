<?php

namespace Database\Factories;

use App\Models\CategoryModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemModel>
 */
class ItemModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => CategoryModel::query()->inRandomOrder()->first()->category_id,
            'item_code' => $this->faker->unique()->ean8(),
            'item_name' => $this->faker->name(),
            'buy_price' => $this->faker->randomFloat(2, 10, 100),
            'sell_price' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
