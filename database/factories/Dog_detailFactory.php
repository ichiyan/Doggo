<?php

namespace Database\Factories;

use App\Models\Dog_detail;
use Illuminate\Database\Eloquent\Factories\Factory;

class Dog_detailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dog_detail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'kennel_name' => $this->faker->lastName(),
            'birthdate' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['M', 'F']),
            'breed' => $this->faker->randomElement(['Shiba Inu', 'German Shepherd', 'Bulldog',]),
        ];
    }
}
