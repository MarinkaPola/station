<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'country' => $this->faker->country,
            'city' => $this->faker->city,
            'phone' => $this->faker->e164PhoneNumber,
            'role' => $this->faker->randomElement(User::ROLES),
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
        ];
    }
}
