<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTypeSeeder extends Seeder
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
            DB::table('post_types')->insert(['post_type_name' => $type]);
        }
    }
}
