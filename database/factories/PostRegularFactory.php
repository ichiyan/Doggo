<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostRegular;
use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostRegularFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostRegular::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'regular_id' => UserProfile::inRandomOrder()->first(),
            'post_id' => Post::inRandomOrder()->first(),
        ];
    }
}
