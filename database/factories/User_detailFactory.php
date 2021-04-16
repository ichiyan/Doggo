<?php

namespace Database\Factories;

use App\Models\User_detail;
use Illuminate\Database\Eloquent\Factories\Factory;

class User_detailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User_detail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'age' => $this->faker->randomDigit(),
            'gender' => $this->faker->randomElement(['M', 'F']),
        ];
    }
}
