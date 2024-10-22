<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            "image" => 'https://picsum.photos/200/300',
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
