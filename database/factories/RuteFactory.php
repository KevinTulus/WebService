<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rute>
 */
class RuteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'angkot_id ' => fake()->randomDigitNotNull(),
            // 'nama_jalan' => fake()->streetName(),
            // 'urutan' => fake()->unique()->numberBetween(1, 10),
            // 'km' => fake()->randomFloat(1, 1, 10),
            'street_name_id' => fake()->numberBetween(1, 50),
        ];
    }
}
