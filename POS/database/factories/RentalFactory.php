<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rental>
 */
class RentalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('-1 year', 'now');
        $endDate = fake()->dateTimeBetween($startDate, $startDate->modify('+1 year'));
        $status = fake()->randomElement(['active', 'inactive', 'pending']);

        return [
            'tenant_id' => Tenant::query()->inRandomOrder()->first()->id,
            'room_id' => Room::query()->inRandomOrder()->first()->id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => $status,
            'attachment' => 'attachment/dummy.png',
            'ended' => $status === 'inactive' ? $endDate : null
        ];
    }
}