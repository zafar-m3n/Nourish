<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationOrderController extends Controller
{
    /**
     * Display a list of available donations for the recipient.
     */
    public function availableDonations()
    {
        $donations = Donation::where('status', 'available')->get(); // Fetch available donations
        return view('recipient.available_donations', compact('donations'));
    }

    /**
     * Place an order for a donation.
     */
    public function placeOrder(Donation $donation)
    {
        // Ensure the donation is still available
        if ($donation->status !== 'available') {
            return redirect()->route('recipient.available_donations')->with('error', 'Donation is no longer available.');
        }

        // Create the order
        Order::create([
            'donation_id' => $donation->id,
            'recipient_id' => Auth::id(),
            'status' => 'pending', // Set the order status as pending
        ]);

        // Mark the donation as in transit
        $donation->update([
            'status' => 'in_transit',
        ]);

        return redirect()->route('recipient.my_orders')->with('success', 'Order placed successfully!');
    }

    /**
     * Display the list of orders placed by the recipient.
     */
    public function myOrders()
    {
        $orders = Order::where('recipient_id', Auth::id())->with('donation')->get(); // Fetch orders of the current recipient
        return view('recipient.my_orders', compact('orders'));
    }
}
