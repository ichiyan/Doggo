<?php

namespace Database\Factories;

use App\Models\Dog;
use App\Models\DogDetail;
use App\Models\DogLitter;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Hash;

class DogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        if (User::all()->count() == 0) {
            User::create([
                'email' => 'user@gmail.com',
                'password' => Hash::make('User123'),
            ]);
        }

        $user = UserProfile::inRandomOrder()->first()->id;

        return [
            'registered_number' => $this->faker->swiftBicNumber(),
            'price' => $this->faker->randomNumber(5),
            'dog_owner_id' => $user,
            'dog_detail_id' => DogDetail::factory(1)->create()[0]->id,
            'dog_litter_id' => DogLitter::factory(1)->create()[0]->id,
        ];
    }
}
