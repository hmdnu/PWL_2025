<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SupplierModel>
 */
class SupplierModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'supplier_name' => $this->faker->company(),
            'supplier_address' => $this->faker->address(),
            'supplier_phone' => $this->faker->phoneNumber(),
            'supplier_email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
