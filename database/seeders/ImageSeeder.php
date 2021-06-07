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
            if ($post->id > 3) {
                DB::table('images')->insert([
                    'post_id' => $post->id,
                    'image_location' => "default-dog-pic.jpg",
                    'description' => "A picture about the dog being posted",
                ]);
                DB::table('images')->insert([
                    'post_id' => $post->id,
                    'image_location' => "default-dog-pic.jpg",
                    'description' => "A picture about the dog being posted",
                ]);
                DB::table('images')->insert([
                    'post_id' => $post->id,
                    'image_location' => "default-dog-pic.jpg",
                    'description' => "A picture about the dog being posted",
                ]);
            }
        }
    }
}
