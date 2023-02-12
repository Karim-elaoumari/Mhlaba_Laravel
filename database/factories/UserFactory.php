<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'username' => fake()->userName,
        'email' => fake()->unique()->safeEmail,
        'password' => bcrypt('password'),
        'account_status' => fake()->boolean,
        'role' => fake()->numberBetween(0, 2),
        'token' => fake()->uuid,
        ];
    }
}
