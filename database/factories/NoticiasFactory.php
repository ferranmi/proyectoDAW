<?php

namespace Database\Factories;

use App\Models\Noticias;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NoticiasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Noticias::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->name,
            'title' => $this->faker->sentence(),
            'content' => $this->faker->sentence(),
            'd_short' => $this->faker->sentence(),
            'commentaries' => $this->faker->paragraph(),
            'image' => $this->faker->image()
        ];
    }
}
