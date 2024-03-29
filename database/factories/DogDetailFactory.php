<?php

namespace Database\Factories;

use App\Models\DogDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class DogDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DogDetail::class;

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
            'breed' => $this->faker->randomElement(['Shiba Inu', 'Chihuahua', 'Shih Tzu', 'German Shepherd', 'Bulldog', 'Terrier']),
            'size' => $this->faker->randomElement(['Small (less than 10 kg)', 'Medium (11-26 kg)', 'Large (27-45 kg)', 'Extra Large (greater than 45 kg)']),
        ];
    }
}
