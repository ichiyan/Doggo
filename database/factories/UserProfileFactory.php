<?php

namespace Database\Factories;

use App\Models\PcciMember;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserProfile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'birthdate' => $this->faker->date(),
            'address' => $this->faker->address(),
            'username' => $this->faker->userName(),
            'bio' => "Hello, I am a cupcake",
            'profile_pic' => "storage/profile/default-user.png",
            'contact_number' => $this->faker->tollFreePhoneNumber(),
            'user_id' => User::factory(1)->create()[0]->id,
            'PCCI_member_id' => PcciMember::factory(1)->create()[0]->id,
        ];
    }
}
