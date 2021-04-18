<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class User_profileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name' => $this->faker->name(),
            'birthdate' => $this->faker->date(),
            'address' => $this->faker->streetAddress(),
            'complete_home_address' => $this->faker->address(),
            'username' => $this->faker->userName(),
            'bio' => "Hello, I am a cupcake",
            'profile_pic' => "/default-pic.png",
            'contact_number' => $this->faker->tollFreePhoneNumber(),
            'user_id' => User::inRandomOrder()->first()->user_id,
            'user_type' => $this->faker->randomElement(['PCCI Member', 'Regular']),
        ];
    }
}
