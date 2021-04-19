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
        $array = ['dogPic1.png', 'dogPic2.png', 'dogPic3.png', 'dogPic4.png', 'dogPic5.png',];

        foreach($array as $pic) {
            DB::table('images')->insert([
                'post_id' => Post::inRandomOrder()->first()->id,
                'image_location' => $pic,
                'description' => "A picture about the dog being posted",
            ]);
        }
    }
}
