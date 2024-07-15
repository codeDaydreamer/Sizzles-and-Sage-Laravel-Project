<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Adjust User model path if different
use App\Models\Order; // Assuming you have an Order model

class UserProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user(); // Fetch authenticated user

        // Load user's orders with total amount
        $orders = Order::where('user_id', $user->id)->get();
        $totalAmount = $orders->sum('total_amount'); // Assuming 'total_amount' is a column in your orders table

        return view('userprofile', compact('user', 'orders', 'totalAmount'));
    }
}
