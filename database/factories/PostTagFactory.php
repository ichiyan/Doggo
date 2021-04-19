<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use PostTag;

class PostTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tag_id' => Tag::inRandomOrder()->first(),
            'post_id' => Post::inRandomOrder()->first(),
        ];
    }
}
