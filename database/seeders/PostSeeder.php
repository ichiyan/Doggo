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
                'user_id' => 3,
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
                'user_id' => 4,
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
            [
                'user_id' => 1,
                //'dog_id' => 4,
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
            ],
            [
                'user_id' => 3,
                //'dog_id' => 5,
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
            ],
            [
                'user_id' => 4,
                //'dog_id' => 6,
                'dog_litter_id' => 6,
                'post_title' => 'English bulldog for sale',
                'post_type_id' => 1,
                'post_description' => 'English bulldog for sale

                papers on process

                3months old

                please do contact for more info.',

                'price' => 70000,
                'status' => 'Has Documents',
                'interests' => 9,
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                //'dog_id' => 7,
                'dog_litter_id' => 7,
                'post_title' => 'BLUE Eyes Siberian Husky',
                'post_type_id' => 1,
                'post_description' => 'Pure Siberian Husky with PCCI papers

                puppy share available

                price negotiable',

                'price' => 15000,
                'status' => 'Has Documents',
                'interests' => 9,
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                //'dog_id' => 8,
                'dog_litter_id' => 8,
                'post_title' => 'Cute English Bulldog For Sale',
                'post_type_id' => 1,
                'post_description' => 'Cute English Bulldog For Sale @ Philippines Only.

                Black Seal Merle - Male

                100,000 or your best offer. ✌

                Visit our Fb Page @ King Ely

                Feel free to contact @ 09485001333

                Location @ Tagaytay

                Stay Safe.',

                'price' => 100000,
                'status' => 'Has Documents',
                'interests' => 9,
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                //'dog_id' => 9,
                'dog_litter_id' => 9,
                'post_title' => 'Ilonggo dog chow breed',
                'post_type_id' => 1,
                'post_description' => 'Chow puppy for sale',

                'price' => 50000,
                'status' => 'Has Documents',
                'interests' => 9,
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                //'dog_id' => 10,
                'dog_litter_id' => 10,
                'post_title' => 'Bull terrier',
                'post_type_id' => 1,
                'post_description' => 'perfect Bull terrier both white and black males and females need a cute home now',
                'price' => 55000,
                'status' => 'Has Documents',
                'interests' => 30,
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                //'dog_id' => 11,
                'dog_litter_id' => 1,
                'post_title' => 'Quality German Shepherd Puppies For Sale',
                'post_type_id' => 1,
                'post_description' => 'Quality German Shepherd Puppies for Sale!

                DOB: March 02, 2021

                2 Males & 4 Females

                Quality German Shepherd Pure Breed Puppies For Sale!!!

                Very playful, outgoing and well socialized around small children.  Remarkable temperament.

                Vaccinated, dewormed and vet checked. With PCCI papers.

                If interested, contact: 09209119105 (Viber & WhatsApp)',

                'price' => 30000,
                'status' => 'Has Documents',
                'interests' => 91,
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                //'dog_id' => 12,
                'dog_litter_id' => 2,
                'post_title' => 'Pembroke Welsh Corgi',
                'post_type_id' => 1,
                'post_description' => 'Pembroke Welsh Corgi
                    4 males
                    Champ line (Ukraine)
                    Complete vaccines/deworming
                    PCCI pedigree papers on hand',
                'price' => 70000,
                'status' => 'Has Documents',
                'interests' => 12,
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                //'dog_id' => 3,
                'dog_litter_id' => 3,
                'post_title' => 'Doberman Puppies',
                'post_type_id' => 1,
                'post_description' => 'VACCINATED

                    PCCI

                    DEWORMED

                    TANZA CAVITE

                    DOB March 31, 2021',

                'price' => 15000,
                'status' => 'Has Documents',
                'interests' => 1,
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                //'dog_id' => 14
                'dog_litter_id' => 4,
                'post_title' => 'America Bully',
                'post_type_id' => 1,
                'post_description' => 'Standard/Classic Tri-Color American Bully

                    3 Female
                    2 Male

                    RKCP Champ "Rhino" x HappyBullyz Bailey
                    ( FBI Chico Rhino x HappyBullyz MaddieRhino) (TNK Skye of HappyBullyz x HappyBullyz Bella)

                    RARE COLOR

                    ☑ 2 Months
                    ☑ 4x deworm
                    ☑ 2x vaccine by licensed vet
                    ☑ LT on process
                    ☑ UKC aby
                    ☑️ Mixed Raw Meat & Protein Fed

                    Open for viewing in Soldier Hills, Muntinlupa or we can bring the puppies to your home for sure buyers 🙂
                    Can send more photos! Feel free to message for questions and queries.

                    Thanks!',

                'price' => 100000,
                'status' => 'Has Documents',
                'interests' => 76,
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                //'dog_id' => 15,
                'dog_litter_id' => 5,
                'post_title' => 'white pekingese',
                'post_type_id' => 1,
                'post_description' => 'white male pekingese

                2 months old

                open for viewing

                09778098000

                Keywords: white pekingese',

                'price' => 100000,
                'status' => 'Has Documents',
                'interests' => 8,
                'updated_at' => now(),
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
                            'image_location' => 'chao-1.jpeg',
                            'description' => 'He likes snow',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'chao-2.jpeg',
                            'description' => 'Play time',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'chao-3.jpeg',
                            'description' => 'Time to find comfortable space.',
                            'updated_at' => now(),
                        ],
                    ],
                    [//4th post
                        [
                            'image_location' => 'choco-1.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'choco-2.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                    ],
                    [//5th post
                        [
                            'image_location' => 'Inu-1.jpeg',
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
                    [//8th post
                        [
                            'image_location' => 'bulldog2-1.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'bulldog2-2.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'bulldog2-3.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                    ],
                    [//9th post
                        [
                            'image_location' => 'chow-1.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'chow-2.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                    ],
                    [//10th post
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
                    [//13th post
                        [
                            'image_location' => 'dob-1.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'dob-2.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'dob-3.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                    ],
                    [//14th post
                        [
                            'image_location' => 'bully-1.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                    ],
                    [//15th post
                        [
                            'image_location' => 'pekingese-1.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                        [
                            'image_location' => 'pekingese-2.jpeg',
                            'description' => '',
                            'updated_at' => now(),
                        ],
                    ],
                ];

        $arr = [];
        $i = 0;

        foreach ($data as $pData) {
            foreach ($pData as $key => $value) {

            }
        }

        foreach ($data as $pData) {
            $post = Post::create($pData);
            //dog litter for now since it functions as dog_id (since we did not implement litter posts)
            $dogId = Dog::find($pData['dog_litter_id'])->dog_detail_id;
            $dogDetail = DogDetail::find($dogId);

            switch ($i) {
                case 0: $dogDetail->breed = 'Shih Tzu';
                        $breed = 3;
                        break;
                case 1: $dogDetail->breed = 'Doberman';
                        $breed = 7;
                        break;
                case 2: $dogDetail->breed = 'Chao chao';
                        $breed = 8;
                        break;
            }
            $newID = DB::table("posts")->orderBy("id", "desc")->first()->id;
            $tag = Tag::findOrFail($breed);
            $tag->tags()->attach($newID);

            $dogDetail->save();
            foreach ($images[$i] as $image) {
                $image['post_id'] = $post->id;
                DB::table('images')->insert($image);
            }
            $i++;
        }

    }
}
