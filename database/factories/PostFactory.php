<?php

namespace Database\Factories;

use App\Models\Dog;
use App\Models\Post;
use App\Models\PostType;
use App\Models\User;
use App\Models\UserProfile;
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
        $dog = Dog::factory(1)->create()[0];
        $dog->is_Posted = true;
        $dog->save();
        $dog = $dog->dog_litter_id;
        $dogIds = Dog::all('id');

        return [
            //'dog_id' => $this->faker->unique()->randomElement($dogIds),
            'dog_litter_id' => $dog,
            'post_type_id' => PostType::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'post_title' => "Post " . $dog,
            'post_description' => $this->faker->text(50),
            'price' => $this->faker->randomNumber(5),
            'interests' => $this->faker->randomNumber(2),
            'status' => $this->faker->randomElement(['Pending Documents', 'Has Documents']),
        ];
    }
}
