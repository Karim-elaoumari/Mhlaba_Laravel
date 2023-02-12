<?php

namespace Database\Seeders;
use App\Models\Plat;
use App\Models\Categorie;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
        ->count(3)
        ->create();
        Categorie::factory()
        ->count(5)
        ->create();
        Plat::factory()
        ->count(20)
        ->create();
    }
}
