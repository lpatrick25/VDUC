<?php

namespace Database\Factories;

use App\Models\DivingApplication;
use App\Models\DivingLesson;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DivingApplication>
 */
class DivingApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DivingApplication::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->state(['role' => 'Student']),
            'lesson_id' => DivingLesson::factory(),
            'status' => $this->faker->randomElement(['Pending', 'Approved', 'Ongoing', 'Completed', 'Rejected']),
            'schedule_date' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'schedule_time' => $this->faker->time('H:i:s'),
        ];
    }
}
