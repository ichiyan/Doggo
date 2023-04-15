<?php

namespace Database\Seeders;

use App\Models\PcciMember;
use App\Models\User;
use App\Models\UserProfile as ModelsUserProfile;
use Database\Factories\PCCIMemberFactory;
use Database\Factories\UserProfileFactory;
use Illuminate\Database\Seeder;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create(
            [
            'email' => "regular@gmail.com",
            'password' => bcrypt('regularp@ssw0rd')
            ])->id;


        $user2 = User::create(
            [
            'email' => "pcci@gmail.com",
            'password' => bcrypt('pccip@ssw0rd')
            ])->id;


        $user3 = User::create(
            [
            'email' => "admin@gmail.com",
            'password' => bcrypt('adminp@ssw0rd')
            ])->id;

        $userProfiles = \App\Models\UserProfile::factory(3)->create();
        $userProfiles[0]->user_id = $user1;
        $userProfiles[0]->pcci_member_id = null;
        $userProfiles[0]->profile_pic = "storage/profile-pictures/persona-1.jpeg";
        $userProfiles[0]->save();
        $userProfiles[1]->user_id = $user2;
        $userProfiles[1]->profile_pic = "storage/profile-pictures/persona-2.jpeg";
        $userProfiles[1]->save();
        $userProfiles[2]->user_id = $user3;
        $userProfiles[2]->is_admin = true;
        $userProfiles[2]->profile_pic = "storage/profile-pictures/persona-3.jpeg";
        $userProfiles[2]->save();

    }
}
