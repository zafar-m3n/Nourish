<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VolunteerTask;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Http\Request;

class VolunteerTaskController extends Controller
{
    /**
     * Display a listing of the tasks.
     */
    public function index()
    {
        $tasks = VolunteerTask::with(['donation', 'volunteer'])->get(); // Fetch tasks with donation and volunteer relationships
        return view('admin.volunteer_tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new task.
     */
    public function create()
    {
        $donations = Donation::all(); // Get all donations for the dropdown
        $volunteers = User::where('role', 'volunteer')->get(); // Get all volunteers for the dropdown
        return view('admin.volunteer_tasks.create', compact('donations', 'volunteers'));
    }

    /**
     * Store a newly created task in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'task_type' => 'required|string',
            'due_date' => 'required|date',
            'donation_id' => 'required|exists:donations,id',
            'volunteer_id' => 'nullable|exists:users,id',
        ]);

        VolunteerTask::create([
            'task_type' => $request->task_type,
            'due_date' => $request->due_date,
            'status' => 'pending',
            'volunteer_id' => $request->volunteer_id, // This can be null if unassigned
            'donation_id' => $request->donation_id,
        ]);

        return redirect()->route('admin.volunteer-tasks.index')->with('success', 'Task created successfully!');
    }

    /**
     * Show the form for editing a task.
     */
    public function edit(VolunteerTask $volunteerTask)
    {
        $donations = Donation::all(); // Get all donations for the dropdown
        $volunteers = User::where('role', 'volunteer')->get(); // Get all volunteers for the dropdown
        return view('admin.volunteer_tasks.edit', compact('volunteerTask', 'donations', 'volunteers'));
    }

    /**
     * Update the specified task in storage.
     */
    public function update(Request $request, VolunteerTask $volunteerTask)
    {
        $request->validate([
            'task_type' => 'required|string',
            'due_date' => 'required|date',
            'donation_id' => 'required|exists:donations,id',
            'volunteer_id' => 'nullable|exists:users,id',
        ]);

        $volunteerTask->update([
            'task_type' => $request->task_type,
            'due_date' => $request->due_date,
            'status' => $request->status ?? 'pending',
            'volunteer_id' => $request->volunteer_id, // This can remain null if unassigned
            'donation_id' => $request->donation_id,
        ]);

        return redirect()->route('admin.volunteer-tasks.index')->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified task from storage.
     */
    public function destroy(VolunteerTask $volunteerTask)
    {
        $volunteerTask->delete();

        return redirect()->route('admin.volunteer-tasks.index')->with('success', 'Task deleted successfully!');
    }
}
