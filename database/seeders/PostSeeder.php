<?php

namespace Database\Seeders;

use App\Models\Dog;
use App\Models\DogDetail;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            [
                'user_id' => 1,
               // 'dog_id' => 1,
                'dog_litter_id' => 1,
                'post_title' => 'Shih Tzu Puppy for Sale',
                'post_type_id' => 1,
                'post_description' => 'Completely dewormed and vaccinated',
                'price' => 30000,
                'status' => 'Has Documents',
                'interests' => 12,
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
               // 'dog_id' => 2,
                'dog_litter_id' => 2,
                'post_title' => 'Doberman',
                'post_type_id' => 1,
                'post_description' => 'Vaccinated, Dewormed, and a champion.',
                'price' => 20000,
                'status' => 'Has Documents',
                'interests' => 45,
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                //'dog_id' => 3,
                'dog_litter_id' => 3,
                'post_title' => 'Chao Chao',
                'post_type_id' => 1,
                'post_description' => 'Vaccinated, Dewormed, and a teddy bear in the house. A chunky boy that likes to sleep.',
                'price' => 60000,
                'status' => 'Has Documents',
                'interests' => 9,
                'updated_at' => now(),
            ],
        ];

        $images = [
                    [
                        [
                            'image_location' => 'images/shih-1.jpeg',
                            'description' => 'Normal Sitting Pose',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'images/shih-2.jpeg',
                            'description' => 'Brocolli again?',
                            'updated_at' => now(),
                        ]
                    ],
                    [
                        [
                            'image_location' => 'images/dober-1.jpeg',
                            'description' => 'Normal Sitting Pose',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'images/dober-2.jpeg',
                            'description' => 'Curious dober',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'images/dober-3.jpeg',
                            'description' => 'Favorite toy, can somebody throw it?',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'images/dober-4.jpeg',
                            'description' => 'Glasses Dober',
                            'updated_at' => now(),
                        ],
                    ],
                    [
                        [
                            'image_location' => 'images/chao-1.jpeg',
                            'description' => 'He likes snow',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'images/chao-2.jpeg',
                            'description' => 'Play time',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'images/chao-3.jpeg',
                            'description' => 'Time to find comfortable space.',
                            'updated_at' => now(),
                        ],
                    ],
                ];

        $arr = [];
        $i = 0;

        foreach ($data as $pData) {
            $post = Post::create($pData);
            // $dogId = Dog::find($pData['dog_id'])->dog_detail_id;
            // $dogDetail = DogDetail::find($dogId);

            // switch ($i) {
            //     case 0: $dogDetail->breed = 'Shih Tzu';
            //             break;
            //     case 1: $dogDetail->breed = 'Doberman';
            //             break;
            //     case 2: $dogDetail->breed = 'Chao chao';
            //             break;
            // }

            // $dogDetail->save();
            foreach ($images[$i] as $image) {
                $image['post_id'] = $post->id;
                DB::table('images')->insert($image);
            }
            $i++;
        }


    }
}
