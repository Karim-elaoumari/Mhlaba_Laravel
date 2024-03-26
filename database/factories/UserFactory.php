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
        'username' => 'abdelhak',
        'email' => 'store.abdo@gmail.com',
        'password' => bcrypt('AbdelhakKarim10@'),
        'account_status' => 1,
        'token' => fake()->uuid,
        ];
    }
}
