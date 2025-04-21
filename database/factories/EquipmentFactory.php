<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EquipmentFactory extends Factory
{
    public function definition()
    {
        return [
            'equipment_name' => $this->faker->word . ' Equipment',
            'quantity' => $this->faker->numberBetween(1, 20),
        ];
    }
}
