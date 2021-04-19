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
        $array = ['cute', 'valiant', 'grumpy', 'chill', 'shy', 'enthusiastic', 'mischievous'];

        foreach($array as $tag) {
            DB::table('tags')->insert(['tag_name' => $tag]);
        }
    }
}
