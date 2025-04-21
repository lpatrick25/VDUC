<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DivingLessonFactory extends Factory
{
    public function definition()
    {
        return [
            'lesson_name' => 'Lesson ' . $this->faker->word,
            'description' => $this->faker->sentence,
            'duration_minutes' => $this->faker->randomElement(['60', '120', '720', '1440']),
            'price' => $this->faker->randomFloat(2, 500, 5000),
        ];
    }
}
