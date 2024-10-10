<?php

namespace App\Http\Controllers;

use App\Models\VolunteerTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VolunteerTaskController extends Controller
{
    /**
     * Display a list of unassigned tasks for volunteers.
     */
    public function availableTasks()
    {
        $tasks = VolunteerTask::whereNull('volunteer_id')->get();
        return view('volunteer.available_tasks', compact('tasks'));
    }

    /**
     * Assign a task to the logged-in volunteer.
     */
    public function assignTask(VolunteerTask $volunteerTask)
    {
        $volunteerTask->update([
            'volunteer_id' => Auth::id(),
            'status' => 'in_progress',
        ]);

        return redirect()->route('volunteer.my_tasks')->with('success', 'Task assigned successfully!');
    }

    /**
     * Display the tasks assigned to the logged-in volunteer.
     */
    public function myTasks()
    {
        $tasks = VolunteerTask::where('volunteer_id', Auth::id())->get();
        return view('volunteer.my_tasks', compact('tasks'));
    }
    public function completeTask(VolunteerTask $volunteerTask)
    {
        // Ensure the logged-in volunteer is assigned to this task
        if ($volunteerTask->volunteer_id !== Auth::id()) {
            return redirect()->route('volunteer.my_tasks')->with('error', 'You are not authorized to complete this task.');
        }

        // Mark the task as completed
        $volunteerTask->update([
            'status' => 'completed',
        ]);

        return redirect()->route('volunteer.my_tasks')->with('success', 'Task marked as completed.');
    }
}
