<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Angkot>
 */
class AngkotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no' => fake()->unique()->randomNumber(2, true),
            'nama_angkot' => fake()->word(),
            'warna' => fake()->safeColorName(),
        ];
    }
}
