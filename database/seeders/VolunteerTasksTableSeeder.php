<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VolunteerTasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('volunteer_tasks')->insert([
            [
                'volunteer_id' => 3, // Assigned to volunteer
                'donation_id' => 1,
                'task_type' => 'collection',
                'status' => 'pending',
                'due_date' => Carbon::now()->addDays(3),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'volunteer_id' => null, // Unassigned task
                'donation_id' => 2,
                'task_type' => 'delivery',
                'status' => 'pending',
                'due_date' => Carbon::now()->addDays(4),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'volunteer_id' => 3,
                'donation_id' => 3,
                'task_type' => 'collection',
                'status' => 'completed',
                'due_date' => Carbon::now()->subDays(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'volunteer_id' => 3,
                'donation_id' => 4,
                'task_type' => 'delivery',
                'status' => 'in_progress',
                'due_date' => Carbon::now()->addDays(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'volunteer_id' => null, // Unassigned task
                'donation_id' => 5,
                'task_type' => 'collection',
                'status' => 'pending',
                'due_date' => Carbon::now()->addDays(2),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
