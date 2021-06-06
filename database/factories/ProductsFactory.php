<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->randomNumber(2),
            'name' => $this->faker->name(),
            'price' => $this->faker->randomFloat(2,0,1000),
            'stock' => $this->faker->randomNumber(3),
            'image' => $this->faker->image(),
            'descripcio' => $this->faker->paragraph(),
        ];
    }
}
