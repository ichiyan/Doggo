<?php

namespace Database\Factories;

use App\Models\PCCIMember;
use Illuminate\Database\Eloquent\Factories\Factory;

class PCCIMemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PCCIMember::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'citizenship' => $this->faker->country(),
            'educational_attainment' => $this->faker->randomElement(['Elementary Graduate', 'Highschool Graduate', 'College Graduate']),
            'employment' => $this->faker->place->company(),
            'employer_name' => $this->faker->name(),
            'employer_address' => $this->faker->address(),
            'isInterestedInDogShows' => $this->faker->randomElement([true, false]),
            'isVolunteer' => $this->faker->randomElement([true, false]),
        ];
    }
}
