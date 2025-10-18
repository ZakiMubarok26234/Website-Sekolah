<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis' => '2024' . str_pad(fake()->unique()->numberBetween(1, 999), 3, '0', STR_PAD_LEFT),
            'name' => fake()->name(),
            'gender' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'birth_date' => fake()->dateTimeBetween('-17 years', '-12 years'),
            'birth_place' => fake()->city(),
            'address' => fake()->address(),
            'phone' => fake()->optional()->phoneNumber(),
            'class' => fake()->randomElement(['7A', '7B', '7C', '8A', '8B', '8C', '9A', '9B', '9C']),
            'parent_id' => \App\Models\User::where('role', 'orang_tua')->inRandomOrder()->first()?->id,
            'is_active' => fake()->boolean(90), // 90% kemungkinan aktif
        ];
    }
}
