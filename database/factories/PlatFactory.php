<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Categorie;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plat>
 */
class PlatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'title'=>fake()->title(),
           'desc' =>fake()->paragraph(),
           'image'=> fake()->imageUrl(),
           'categorie_id' => fake()->numberBetween(Categorie::min('id'),Categorie::max('id')),
            'user_id' => fake()->numberBetween(User::min('id'),User::max('id')),
            'price' =>fake()->randomFloat(2, 0, 100),
        ];
    }
}
