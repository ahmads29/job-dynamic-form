<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Truncate the users table to remove all records
        User::truncate();

        // Now you can insert the new user
        User::create([
            'name' => 'ahmad',
            'email' => 'admin@alahmadnursecare.com',
            'password' => bcrypt('alahmadnursecare_1500'),
        ]);
    }
}
