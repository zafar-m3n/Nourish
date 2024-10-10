<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the recipient orders.
     */
    public function index()
    {
        $orders = Order::with('donation', 'recipient', 'volunteer')->get();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for editing the specified order.
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified order.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,in_transit,delivered',
            'delivery_date' => 'nullable|date',
            'volunteer_id' => 'nullable|exists:users,id',
        ]);

        $order->update([
            'status' => $request->status,
            'delivery_date' => $request->delivery_date,
            'volunteer_id' => $request->volunteer_id,
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified order.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }
}
