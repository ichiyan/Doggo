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
            'dog_litter_id' => Dog_litter::inRandomOrder()->first(),
            'post_type' => Post_type::inRandomOrder()->first(),
            'post_title' => $this->faker->realText(15),
            'description' => $this->faker->text(50),
            'price' => $this->faker->randomNumber(5),
            'interests' => $this->faker->randomNumber(2),
            'status' => $this->faker->randomElement(['Pending Documents', 'Has Documents']),
        ];
    }
}
