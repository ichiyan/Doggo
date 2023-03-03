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
                    'Doberman', 'Chow Chow', 'Husky', 'Corgi', 'Bully', 'Pekingese',
                    'Calabarzon', 'West Visayas', 'Central Visayas', 'Soccskargen',
                    'M', 'F', 'Small (less than 10 kg)', 'Medium (11-26 kg)',
                    'Large (27-45 kg)', 'Extra Large (greater than 45 kg)', ];
        $categories = [ 'Breed', 'Breed', 'Breed', 'Breed', 'Breed', 'Breed',
                    'Breed', 'Breed', 'Breed', 'Breed', 'Breed', 'Breed',
                    'Location', 'Location', 'Location', 'Location',
                    'Gender', 'Gender', 'Size', 'Size', 'Size', 'Size', ];

        foreach($array as $key => $tag) {
            DB::table('tags')->insert(['tag_name' => $tag, 'tag_category' => $categories[$key]]);
        }

    }
}
