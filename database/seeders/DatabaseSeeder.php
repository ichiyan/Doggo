<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\PostType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\UserProfile::factory(1)->create();
        \App\Models\Dog::factory(10)->create();
        $this->call([TagSeeder::class, PostTypeSeeder::class]);
        \App\Models\Post::factory(10)->create();
        $this->call([ImageSeeder::class]);
    }
}
