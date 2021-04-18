<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Post_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ['sell', 'stud', 'rehome'];

        foreach($array as $type) {
            DB::table('post_type')->insert(['post_type_name' => $type]);
        }
    }
}
