<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('food')->insert([
            [
                'name' => 'Kadhi Recipe',
                'category' => 1,
                'file_path' => 'web_assets/img/product/product-1.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Paneer Curry Recipe',
                'category' => 1,
                'file_path' => 'web_assets/img/product/product-2.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Black Eyed Peas Curry Recipe',
                'category' => 1,
                'file_path' => 'web_assets/img/product/product-3.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Bombay Potatoes',
                'category' => 1,
                'file_path' => 'web_assets/img/product/product-4.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Gobi Manchurian Recipe',
                'category' => 1,
                'file_path' => 'web_assets/img/product/product-5.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Vegetable Jalfrezi Recipe',
                'category' => 1,
                'file_path' => 'web_assets/img/product/product-6.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Vegetable Pakora Recipe',
                'category' => 1,
                'file_path' => 'web_assets/img/product/product-7.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Bheja Masala',
                'category' => 2,
                'file_path' => 'web_assets/img/product/product-8.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Butter Chicken',
                'category' => 2,
                'file_path' => 'web_assets/img/product/product-9.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Chicken Chettinad',
                'category' => 2,
                'file_path' => 'web_assets/img/product/product-10.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Chicken Tikka',
                'category' => 2,
                'file_path' => 'web_assets/img/product/product-1.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Egg Curry',
                'category' => 2,
                'file_path' => 'web_assets/img/product/product-12.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Haleem',
                'category' => 2,
                'file_path' => 'web_assets/img/product/product-13.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Kankada Jhola',
                'category' => 2,
                'file_path' => 'web_assets/img/product/product-14.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]

        ]);
    }
}
