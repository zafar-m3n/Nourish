<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Donation;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get the first available donor, volunteer, and recipient
        $donor = User::where('role', 'donor')->first();        // Get a donor user
        $volunteer = User::where('role', 'volunteer')->first(); // Get a volunteer user
        $recipient = User::where('role', 'recipient')->first(); // Get a recipient user

        // Ensure the donor exists before proceeding
        if (!$donor || !$volunteer || !$recipient) {
            // Output error if any required role user is missing
            return;
        }

        // Create 5 orders, using available donations and dynamically fetched user IDs
        DB::table('orders')->insert([
            [
                'donation_id' => 1, 
                'recipient_id' => $recipient->id,
                'volunteer_id' => $volunteer->id,
                'status' => 'in_transit',
                'delivery_date' => Carbon::now()->addDays(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'donation_id' => 2,
                'recipient_id' => $recipient->id,
                'volunteer_id' => $volunteer->id,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'donation_id' => 3,
                'recipient_id' => $recipient->id,
                'volunteer_id' => $volunteer->id,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'donation_id' => 4,
                'recipient_id' => $recipient->id,
                'volunteer_id' => $volunteer->id,
                'status' => 'in_transit',
                'delivery_date' => Carbon::now()->addDays(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'donation_id' => 5,
                'recipient_id' => $recipient->id,
                'volunteer_id' => $volunteer->id,
                'status' => 'delivered',
                'delivery_date' => Carbon::now()->subDays(1),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
