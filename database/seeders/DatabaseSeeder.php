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
        $this->call([PostSeeder::class]);
        \App\Models\Post::factory(30)->create();
        \App\Models\PostTag::factory(50)->create();
        // \App\Models\PostRegular::factory(40)->create();
        $this->call([ImageSeeder::class]);
        $this->call([UserProfileSeeder::class]);
    }
}
