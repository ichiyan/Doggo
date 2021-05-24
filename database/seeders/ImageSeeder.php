<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();

        foreach($posts as $post) {
            DB::table('images')->insert([
                'post_id' => $post->id,
                'image_location' => "storage/posts/default-dog-pic.jpg",
                'description' => "A picture about the dog being posted",
            ]);
            DB::table('images')->insert([
                'post_id' => $post->id,
                'image_location' => "storage/posts/default-dog-pic.jpg",
                'description' => "A picture about the dog being posted",
            ]);
            DB::table('images')->insert([
                'post_id' => $post->id,
                'image_location' => "storage/posts/default-dog-pic.jpg",
                'description' => "A picture about the dog being posted",
            ]);
        }
    }
}
