<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();

        // Calculate the total amount
        $totalAmount = $orders->sum('item_price');

        return view('user.profile', compact('user', 'orders', 'totalAmount'));
    }
}
