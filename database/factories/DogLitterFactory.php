<?php

namespace Database\Factories;

use App\Models\DogLitter;
use Illuminate\Database\Eloquent\Factories\Factory;

class DogLitterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DogLitter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'population' => $this->faker->randomNumber(1),
        ];
    }
}
