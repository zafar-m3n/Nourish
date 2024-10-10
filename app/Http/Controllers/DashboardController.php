<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Donation;
use App\Models\Order;
use App\Models\VolunteerTask;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the dashboard for each user role.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            $totalUsers = User::count();
            $totalDonors = User::where('role', 'donor')->count();
            $totalVolunteers = User::where('role', 'volunteer')->count();
            $totalRecipients = User::where('role', 'recipient')->count();
            $totalDonations = Donation::count();
            $totalOrders = Order::count();
            $totalTasks = VolunteerTask::count();

            return view('admin.dashboard', compact('totalUsers', 'totalDonors', 'totalVolunteers', 'totalRecipients', 'totalDonations', 'totalOrders', 'totalTasks'));
        }

        if ($user->role == 'donor') {
            $myDonationsCount = Donation::where('user_id', $user->id)->count();
            $donationHistoryCount = Donation::where('user_id', $user->id)->where('status', '!=', 'available')->count();
            $pendingDonationsCount = Donation::where('user_id', $user->id)->where('status', 'available')->count();
            $linkedOrdersCount = Order::whereHas('donation', function($query) use ($user) {
                $query->where('user_id', $user->id);
            })->count();

            return view('donor.dashboard', compact('myDonationsCount', 'donationHistoryCount', 'pendingDonationsCount', 'linkedOrdersCount'));
        }

        if ($user->role == 'volunteer') {
            $availableTasksCount = VolunteerTask::whereNull('volunteer_id')->count();
            $assignedTasksCount = VolunteerTask::where('volunteer_id', $user->id)->count();
            $completedTasksCount = VolunteerTask::where('volunteer_id', $user->id)->where('status', 'completed')->count();

            return view('volunteer.dashboard', compact('availableTasksCount', 'assignedTasksCount', 'completedTasksCount'));
        }

        if ($user->role == 'recipient') {
            $availableDonationsCount = Donation::where('status', 'available')->count();
            $pendingOrdersCount = Order::where('recipient_id', $user->id)->where('status', 'pending')->count();
            $completedOrdersCount = Order::where('recipient_id', $user->id)->where('status', 'delivered')->count();

            return view('recipient.dashboard', compact('availableDonationsCount', 'pendingOrdersCount', 'completedOrdersCount'));
        }
    }
}
