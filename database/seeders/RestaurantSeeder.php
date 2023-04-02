<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('restaurants')->insert([
            [
                'name' => '1135 AD',
                'gst_no' => '24AAACC4175D1Z4',
                'city' => 'Jaipur',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'The Bombay Canteen',
                'gst_no' => '27AAACC4175D1ZY',
                'city' => 'Mumbai',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => '1559 AD',
                'gst_no' => '19AAACC4175D1ZV',
                'city' => 'Udaipur',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Ballygunge Place',
                'gst_no' => '23AAACC4175D1Z6',
                'city' => 'Kolkata',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Bomra s',
                'gst_no' => '07AAACC4175D1Z0',
                'city' => 'Goa',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Aish',
                'gst_no' => '09AAACC4175D1ZW',
                'city' => 'Hyderabad',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'The Bangala',
                'gst_no' => '04AAACC4175D1Z6',
                'city' => 'Pudukkottai',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Agashiye',
                'gst_no' => '06AAACC4175D1Z2',
                'city' => 'Ahmedabad',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Ambrai',
                'gst_no' => '08AAACC4175D1ZY',
                'city' => 'Udaipur',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'The Black Sheep Bistro',
                'gst_no' => '32AAACC4175D1Z7',
                'city' => 'Goa',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
