<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->insert([
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'mobile' => '1234567890',
                'address' => '1st Floor, Fortune Suites, 134, E Periasamy Rd, above Poppet Jamal, R.S. Puram, Coimbatore, Tamil Nadu',
                'city' => 'coimbatore',
                'pin' => '631027',
                'password' => Hash::make('user@123'),
                'is_admin' => '0',
                'file_path' => 'web_assets/img/user/user-1.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'mobile' => '6934567152',
                'address' => '1st Floor, Fortune Suites, 134, E Periasamy Rd, above Poppet Jamal, R.S. Puram, Coimbatore, Tamil Nadu 641002',
                'city' => 'coimbatore',
                'pin' => '641002',
                'password' => Hash::make('admin@123'),
                'is_admin' => '1',
                'file_path' => 'web_assets/img/user/admin-1.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
