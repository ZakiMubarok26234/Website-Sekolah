<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subjects = [
            ['MTK', 'Matematika'],
            ['IND', 'Bahasa Indonesia'], 
            ['ING', 'Bahasa Inggris'],
            ['IPA', 'IPA'],
            ['IPS', 'IPS'],
            ['PKN', 'PKN'],
            ['OR', 'Olahraga'],
            ['SEN', 'Seni Budaya'],
            ['FIS', 'Fisika'],
            ['KIM', 'Kimia'],
            ['BIO', 'Biologi'],
            ['GEO', 'Geografi'],
            ['SEJ', 'Sejarah'],
            ['EKO', 'Ekonomi'],
            ['AGM', 'Agama'],
            ['TIK', 'TIK'],
        ];

        $subject = $this->faker->randomElement($subjects);

        return [
            'code' => $subject[0],
            'name' => $subject[1],
            'description' => 'Mata pelajaran ' . $subject[1] . ' untuk tingkat SMP',
            'credit_hours' => $this->faker->numberBetween(2, 4),
            'is_active' => true,
        ];
    }
}
