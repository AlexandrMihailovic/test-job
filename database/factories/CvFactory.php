<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CvFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'education' => $this->faker->paragraph(rand(1, 10)),
            'work' => $this->faker->paragraph(rand(1, 10)),
            'experience' => $this->faker->numberBetween(1, 10),
        ];
    }
}
