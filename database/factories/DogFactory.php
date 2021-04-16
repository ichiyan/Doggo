<?php

namespace Database\Factories;

use App\Models\Dog;
use App\Models\Dog_detail;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
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
                'password' => Hash::make('user123'),
            ]);
        }
        $user = User::all()->random()->id;
        $dog_detail = Dog_detail::all()->random()->id;
        return [
            'registered_number' => $this->faker->swiftBicNumber(),
            'dog_owner_id' => $user,
            'dog_detail_id' => $dog_detail,
            'dog_doc_id' => null,
        ];
    }
}
