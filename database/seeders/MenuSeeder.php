<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            [
                'restaurant_id' => '9',
                'food_id' => 12,
                'price' => 102.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'restaurant_id' => '6',
                'food_id' => 2,
                'price' => 503.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'restaurant_id' => '1',
                'food_id' => 10,
                'price' => 59.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'restaurant_id' => '3',
                'food_id' => 2,
                'price' => 99.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'restaurant_id' => '6',
                'food_id' => 4,
                'price' => 55.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'restaurant_id' => '5',
                'food_id' => 6,
                'price' => 302.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'restaurant_id' => '8',
                'food_id' => 4,
                'price' => 405.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'restaurant_id' => '5',
                'food_id' => 8,
                'price' => 458.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'restaurant_id' => '9',
                'food_id' => 11,
                'price' => 78.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'restaurant_id' => '8',
                'food_id' => 12,
                'price' => 265.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'restaurant_id' => '5',
                'food_id' => 4,
                'price' => 584.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'restaurant_id' => '7',
                'food_id' => 1,
                'price' => 154.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'restaurant_id' => '6',
                'food_id' => 8,
                'price' => 115.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'restaurant_id' => '7',
                'food_id' => 10,
                'price' => 166.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'restaurant_id' => '4',
                'food_id' => 10,
                'price' => 247.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'restaurant_id' => '8',
                'food_id' => 8,
                'price' => 548.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'restaurant_id' => '1',
                'food_id' => 10,
                'price' => 118.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'restaurant_id' => '5',
                'food_id' => 2,
                'price' => 159.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'restaurant_id' => '4',
                'food_id' => 4,
                'price' => 170.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'restaurant_id' => '6',
                'food_id' => 9,
                'price' => 170.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ]);
    }
}
