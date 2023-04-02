<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use Database\Seeders\FoodSeeder;
use Database\Seeders\RestaurantSeeder;
use Database\Seeders\MemberSeeder;
use Database\Seeders\MenuSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            FoodSeeder::class,
            RestaurantSeeder::class,
            MemberSeeder::class,
            MenuSeeder::class,
        ]);
    }
}
