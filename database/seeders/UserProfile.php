<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile as ModelsUserProfile;
use Database\Factories\PCCIMemberFactory;
use Database\Factories\UserProfileFactory;
use Illuminate\Database\Seeder;

class UserProfile extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach($users as $user) {
            $user->userId = ModelsUserProfile::factory(1)->create()->id;
            $user->PCCI_member_id = PCCIMemberFactory::factory(1)->create()->id;

        }
    }
}
