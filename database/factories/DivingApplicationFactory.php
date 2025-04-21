<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\DivingLesson;

class DivingApplicationFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'lesson_id' => DivingLesson::factory(),
            'status' => $this->faker->randomElement(['Pending', 'Approved', 'Ongoing', 'Completed', 'Rejected']),
            'schedule_date' => $this->faker->optional()->date(),
            'schedule_time' => $this->faker->optional()->time(),
        ];
    }
}
