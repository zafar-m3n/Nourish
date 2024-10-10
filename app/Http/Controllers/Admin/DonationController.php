<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the donations.
     */
    public function index()
    {
        $donations = Donation::all();
        return view('admin.donations.index', compact('donations'));
    }

    /**
     * Show the form for creating a new donation.
     */
    public function create()
    {
        return view('admin.donations.create');
    }

    /**
     * Store a newly created donation.
     */
    public function store(Request $request)
    {
        $request->validate([
            'food_type' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'expiration_date' => 'required|date',
        ]);

        Donation::create([
            'user_id' => auth()->id(),  // Assuming the admin is creating this donation
            'food_type' => $request->food_type,
            'quantity' => $request->quantity,
            'expiration_date' => $request->expiration_date,
            'status' => 'available',  // Default status
        ]);

        return redirect()->route('admin.donations.index')->with('success', 'Donation created successfully.');
    }

    /**
     * Show the form for editing the specified donation.
     */
    public function edit(Donation $donation)
    {
        return view('admin.donations.edit', compact('donation'));
    }

    /**
     * Update the specified donation.
     */
    public function update(Request $request, Donation $donation)
    {
        $request->validate([
            'food_type' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'expiration_date' => 'required|date',
        ]);

        $donation->update([
            'food_type' => $request->food_type,
            'quantity' => $request->quantity,
            'expiration_date' => $request->expiration_date,
            'status' => $request->status ?? 'available',
        ]);

        return redirect()->route('admin.donations.index')->with('success', 'Donation updated successfully.');
    }

    /**
     * Remove the specified donation.
     */
    public function destroy(Donation $donation)
    {
        $donation->delete();
        return redirect()->route('admin.donations.index')->with('success', 'Donation deleted successfully.');
    }
}
