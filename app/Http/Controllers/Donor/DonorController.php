<?php

namespace App\Http\Controllers\Donor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;

class DonorController extends Controller
{
    // Display all donations made by the donor
    public function myDonations()
    {
        $donations = Donation::where('user_id', Auth::id())->get();
        return view('donor.my_donations', compact('donations'));
    }

    // Show the create donation form
    public function create()
    {
        return view('donor.create');
    }

    // Store the new donation
    public function store(Request $request)
    {
        $request->validate([
            'food_type' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'expiration_date' => 'required|date',
        ]);

        Donation::create([
            'user_id' => Auth::id(),
            'food_type' => $request->food_type,
            'quantity' => $request->quantity,
            'expiration_date' => $request->expiration_date,
            'status' => 'available',
        ]);

        return redirect()->route('donor.my_donations')->with('success', 'Donation created successfully!');
    }

    public function donationHistory()
    {
        $donations = Donation::where('user_id', Auth::id())
            ->whereIn('status', ['in_transit', 'delivered'])
            ->get();

        return view('donor.donation_history', compact('donations'));
    }
}
