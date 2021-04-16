<?php

namespace Database\Factories;

use App\Models\Dog;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dogs = Dog::pluck('registered_number')->all();

        return [
            'registered_number' => $this->faker->randomElement($dogs),
            'description' => $this->faker->text(50),
            'price' => $this->faker->randomNumber(5),
            'contact_num' => $this->faker->phoneNumber(),
            'city' => $this->faker->city(),
            'category' => $this->faker->randomElement([
                'German Shepherd',
                'Shiba Inu',
                'Bulldog',
                'Afghan Hound',
                'Doberman',
                'Chihuahua',
                'ChaoChao'
            ]),
        ];
    }
}
