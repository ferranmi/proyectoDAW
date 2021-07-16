<?php

namespace Database\Factories;

use App\Models\Races;
use Illuminate\Database\Eloquent\Factories\Factory;

class RacesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Races::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->randomNumber(2),
            'name' => $this->faker->sentence(),
            'descripcion' => $this->faker->sentence(),
            'distance' => $this->faker->randomNumber(3),
            'time_start' => $this->faker->dateTime,
            'image' => $this->faker->image()
        ];
    }
}
