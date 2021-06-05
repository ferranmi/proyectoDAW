<?php

namespace Database\Factories;

use App\Models\Contacts;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contacts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->randomNumber(2),
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'subject' => $this->faker->sentence(),
            'comment' => $this->faker->paragraph(),
        ];
    }
}
