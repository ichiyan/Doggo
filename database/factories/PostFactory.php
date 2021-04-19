<?php

namespace Database\Factories;

use App\Models\Dog;
use App\Models\Post;
use App\Models\PostType;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'dog_litter_id' => Dog::factory(1)->create()[0]->dog_litter_id,
            'post_type_id' => PostType::inRandomOrder()->first()->id,
            'post_title' => $this->faker->realText(15),
            'post_description' => $this->faker->text(50),
            'price' => $this->faker->randomNumber(5),
            'interests' => $this->faker->randomNumber(2),
            'status' => $this->faker->randomElement(['Pending Documents', 'Has Documents']),
        ];
    }
}
