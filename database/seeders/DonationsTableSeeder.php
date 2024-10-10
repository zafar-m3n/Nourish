<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DonationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('donations')->insert([
            [
                'user_id' => 2, // Assuming 'Donor User' has id 2
                'food_type' => 'Canned Beans',
                'quantity' => 10,
                'expiration_date' => Carbon::now()->addMonths(6),
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'food_type' => 'Rice',
                'quantity' => 20,
                'expiration_date' => Carbon::now()->addMonths(8),
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'food_type' => 'Pasta',
                'quantity' => 15,
                'expiration_date' => Carbon::now()->addMonths(7),
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'food_type' => 'Cereal',
                'quantity' => 25,
                'expiration_date' => Carbon::now()->addMonths(5),
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'food_type' => 'Canned Tuna',
                'quantity' => 30,
                'expiration_date' => Carbon::now()->addMonths(4),
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
