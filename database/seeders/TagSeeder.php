<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $array = ['cute', 'valiant', 'grumpy', 'chill', 'shy', 'enthusiastic', 'mischievous'];
        $array = [ 'Shiba Inu', 'Chihuahua', 'Shih Tzu', 'German Shepherd', 'Bulldog', 'Terrier',
                    'Calabarzon', 'West Visayas', 'Central Visayas', 'Soccskargen',
                    'Male', 'Female', 'Small', 'Medium', 'Large', 'Extra Large', ];
        $categories = [ 'Breed', 'Breed', 'Breed', 'Breed', 'Breed', 'Breed',
                    'Location', 'Location', 'Location', 'Location',
                    'Gender', 'Gender', 'Size', 'Size', 'Size', 'Size', ];

        foreach($array as $key => $tag) {
            DB::table('tags')->insert(['tag_name' => $tag, 'tag_category' => $categories[$key]]);
        }

    }
}
