<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Donor User',
                'email' => 'donor@donor.com',
                'password' => Hash::make('password'),
                'role' => 'donor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Volunteer User',
                'email' => 'volunteer@volunteer.com',
                'password' => Hash::make('password'),
                'role' => 'volunteer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Recipient User',
                'email' => 'recipient@recipient.com',
                'password' => Hash::make('password'),
                'role' => 'recipient',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
