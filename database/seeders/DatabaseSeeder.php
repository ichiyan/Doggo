<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use database\factories\Dog_detail;

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
        \App\Models\Dog_detail::factory(10)->create();
        \App\Models\Dog::factory(10)->create();
        \App\Models\User_detail::factory(10)->create();
        \App\Models\user::factory(10)->create();
        \App\Models\post::factory(10)->create();
    }
}
