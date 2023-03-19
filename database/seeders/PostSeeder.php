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

    public function mutator($breed, $size) {
        $dog = Dog::factory(1)->create()[0];
        $dogDetail = DogDetail::find($dog->dog_detail_id);
        $dogDetail->breed = $breed;
        $dogDetail->size = $size;
        $dogDetail->save();
        return $dog;
    }

    public function run()
    {
        $data = [
            [
                [
                    'user_id' => 2,
                    'dog_id' => $this->mutator("Shih Tzu", "Small (less than 10 kg)")['id'],
                    'dog_litter_id' => 1,
                    'post_title' => 'Shih Tzu Puppy',
                    'post_type_id' => 1,
                    'post_description' => 'Completely dewormed and vaccinated',
                    'price' => 30000,
                    'status' => 'Has Documents',
                    'interests' => 12,
                    // 'updated_at' => now(),
                ],
            ],
            [

                [
                    'user_id' => 2,
                    'dog_id' => $this->mutator("Doberman", "Large (27-45 kg)")['id'],
                    'dog_litter_id' => 2,
                    'post_title' => 'Doberman',
                    'post_type_id' => 1,
                    'post_description' => 'Vaccinated, Dewormed, and a champion.',
                    'price' => 20000,
                    'status' => 'Has Documents',
                    'interests' => 45,
                    'updated_at' => now(),
                ]
            ],
            [

                [
                    'user_id' => 2,
                    'dog_id' => $this->mutator("Chow Chow", "Large (27-45 kg)")['id'],
                    'dog_litter_id' => 3,
                    'post_title' => 'Chow Chow',
                    'post_type_id' => 1,
                    'post_description' => 'Vaccinated, Dewormed, and a teddy bear in the house. A chunky boy that likes to sleep.',
                    'price' => 60000,
                    'status' => 'Has Documents',
                    'interests' => 9,
                    'updated_at' => now(),
                ]
            ],
            [

                [
                    'user_id' => 2,
                    'dog_id' => $this->mutator("Shih Tzu", "Small (less than 10 kg)")['id'],
                    'dog_litter_id' => 4,
                    'post_title' => 'Pure Choco Liver Shih Tzu Female',
                    'post_type_id' => 1,
                    'post_description' => 'Female 2 months

                    Choco Liver

                    Open for Viewing

                    contact 09778098000',
                    'price' => 20000,
                    'status' => 'Has Documents',
                    'interests' => 9,
                    'updated_at' => now(),
                ]
            ],
            [

                [
                    'user_id' => 4,
                    'dog_id' => $this->mutator("Shiba Inu", "Medium (11-26 kg)")['id'],
                    'dog_litter_id' => 5,
                    'post_title' => 'Shiba Inu',
                    'post_type_id' => 1,
                    'post_description' => '
                        3x Dewormed and 3x Vaccinated by Registered Veterinarian
                        Diet: Pedigree Wet Food, BeefPro Puppy
                        Vitamins: LC-VIT, Vet-C',

                    'price' => 75000,
                    'status' => 'Has Documents',
                    'interests' => 19,
                    'updated_at' => now(),
                ]
            ],
            [

                [
                    'user_id' => 2,
                    'dog_id' => $this->mutator("Bulldog", "Medium (11-26 kg)")['id'],
                    'dog_litter_id' => 6,
                    'post_title' => 'English bulldog',
                    'post_type_id' => 1,
                    'post_description' => 'English bulldog for sale.',
                    'price' => 70000,
                    'status' => 'Has Documents',
                    'interests' => 9,
                    'updated_at' => now(),
                ]
            ],
            [

                [
                    'user_id' => 4,
                    'dog_id' => $this->mutator("Husky", "Medium (11-26 kg)")['id'],
                    'dog_litter_id' => 7,
                    'post_title' => 'Blue-eyed Siberian Husky',
                    'post_type_id' => 1,
                    'post_description' => 'Pure Siberian Husky;

                    puppy share available,

                    price negotiable',

                    'price' => 15000,
                    'status' => 'Has Documents',
                    'interests' => 9,
                    'updated_at' => now(),
                ]
            ],
            [
                // [
                //     ...(array)$this->mutator("German Shepherd"),
                // ],
                [
                    'user_id' => 1,
                    'dog_id' => $this->mutator("Terrier", "Medium (11-26 kg)")['id'],
                    'dog_litter_id' => 10,
                    'post_title' => 'Terrier',
                    'post_type_id' => 1,
                    'post_description' => 'West Highland White Terrier. 3x Dewormed and 3x Vaccinated by registered Veterinarian',
                    'price' => 55000,
                    'status' => 'Has Documents',
                    'interests' => 30,
                    'updated_at' => now(),
                ]
            ],
            [
                // [
                //     ...(array)$this->mutator("German Shepherd"),
                // ],
                [
                    'user_id' => 2,
                    'dog_id' => $this->mutator("German Shepherd", "Large (27-45 kg)")['id'],
                    'dog_litter_id' => 1,
                    'post_title' => 'Quality German Shepherd Puppies',
                    'post_type_id' => 1,
                    'post_description' => 'Quality German Shepherd Puppies for Sale!
                    Very playful, outgoing and well socialized around small children.  Remarkable temperament.

                    Vaccinated, dewormed and vet checked. With PCCI papers.',

                    'price' => 30000,
                    'status' => 'Has Documents',
                    'interests' => 91,
                    'updated_at' => now(),
                ]
            ],
            [

                [
                    'user_id' => 3,
                    'dog_id' => $this->mutator("Corgi", "Medium (11-26 kg)")['id'],
                    'dog_litter_id' => 2,
                    'post_title' => 'Pembroke Welsh Corgi',
                    'post_type_id' => 1,
                    'post_description' => 'Pembroke Welsh Corgi
                        Champ line (Ukraine)
                        Complete vaccines/deworming',
                    'price' => 70000,
                    'status' => 'Has Documents',
                    'interests' => 12,
                    'updated_at' => now(),
                ]
            ],
        ];

        $images = [
                    [
                        [
                            'image_location' => 'shih-1.jpeg',
                            'description' => 'Normal Sitting Pose',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'shih-2.jpeg',
                            'description' => 'Brocolli again?',
                            'updated_at' => now(),
                        ]
                    ],
                    [
                        [
                            'image_location' => 'dober-1.jpeg',
                            'description' => 'Normal Sitting Pose',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'dober-2.jpeg',
                            'description' => 'Curious dober',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'dober-3.jpeg',
                            'description' => 'Favorite toy, can somebody throw it?',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'dober-4.jpeg',
                            'description' => 'Glasses Dober',
                            'updated_at' => now(),
                        ],
                    ],
                    [
                        [
                            'image_location' => 'chow-1.jpeg',
                            'description' => 'He likes snow',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'chow-2.jpeg',
                            'description' => 'Play time',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'chow-3.jpeg',
                            'description' => 'Time to find comfortable space.',
                            'updated_at' => now(),
                        ],
                    ],
                    [//4th post
                        [
                            'image_location' => 'choco-shih-tzu-1.jpg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'choco-shih-tzu-2.jpg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                    ],
                    [//5th post
                        [
                            'image_location' => 'black-shiba-inu-1.jpg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                    ],
                    [//6th post
                        [
                            'image_location' => 'bulldog-1.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'bulldog-2.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'bulldog-3.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                    ],
                    [//7th post
                        [
                            'image_location' => 'husky-1.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'husky-2.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'husky-3.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                    ],
                    // [//8th post
                    //     [
                    //         'image_location' => 'bulldog2-1.jpeg',
                    //         'description' => '',
                    //         'updated_at' => now(),
                    //     ],
                    //     [
                    //         'image_location' => 'bulldog2-2.jpeg',
                    //         'description' => '',
                    //         'updated_at' => now(),
                    //     ],
                    //     [
                    //         'image_location' => 'bulldog2-3.jpeg',
                    //         'description' => '',
                    //         'updated_at' => now(),
                    //     ],
                    // ],
                    // [//9th post
                    //     [
                    //         'image_location' => 'chow-1.jpeg',
                    //         'description' => '',
                    //         'updated_at' => now(),
                    //     ],
                    //     [
                    //         'image_location' => 'chow-2.jpeg',
                    //         'description' => '',
                    //         'updated_at' => now(),
                    //     ],
                    // ],
                    [//10th post
                        [
                            'image_location' => 'terrier-1.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'terrier-1.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                    ],
                    [//11th post
                        [
                            'image_location' => 'german-1.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'german-2.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'german-3.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                    ],
                    [//12th post
                        [
                            'image_location' => 'corgi-1.png',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'corgi-2.png',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'corgi-3.png',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                    ],

                ];

        $arr = [];
        $i = 0;


        foreach ($data as $pData) {

            $post = Post::create($pData[0]);
            $dogDetail = DogDetail::find($post->dog_id);

            $tag = Tag::where('tag_name', $dogDetail->breed)->firstOrFail();
            $tag->tags()->attach($post->id);

            $tag = Tag::where('tag_name', $dogDetail->gender)->firstOrFail();
            $tag->tags()->attach($post->id);

            $tag = Tag::where('tag_name', $dogDetail->size)->firstOrFail();
            $tag->tags()->attach($post->id);

            foreach ($images[$i] as $image) {
                $image['post_id'] = $post->id;
                DB::table('images')->insert($image);
            }
            $i++;
        }
        // foreach ($data as $pData) {
        //     $dogDetail = \App\Models\UserProfile::factory(1)->create()[0];
        //     $post = Post::create($pData);
        //     $dogId = Dog::find($pData['dog_litter_id'])->dog_detail_id;
        //     $dogDetail = DogDetail::find($dogId);

        //     switch ($i) {
        //         case 0: $dogDetail->breed = 'Shih Tzu';
        //                 $breed = 3;
        //                 break;
        //         case 1: $dogDetail->breed = 'Doberman';
        //                 $breed = 7;
        //                 break;
        //         case 2: $dogDetail->breed = 'Chow Chow';
        //                 $breed = 8;
        //                 break;
        //     }
        //     $newID = DB::table("posts")->orderBy("id", "desc")->first()->id;
        //     $tag = Tag::findOrFail($breed);
        //     $tag->tags()->attach($newID);

        //     $dogDetail->save();
        //     foreach ($images[$i] as $image) {
        //         $image['post_id'] = $post->id;
        //         DB::table('images')->insert($image);
        //     }
        //     $i++;
        // }

    }
}
