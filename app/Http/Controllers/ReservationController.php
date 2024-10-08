<?php
namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'date' => 'required|date',
            'time' => 'required',
            'people' => 'required|integer|min:1',
        ]);

        // Save reservation to the database
        Reservation::create($validated);

        // Redirect back to the reservation page with success message
        return redirect()->route('book')->with('success', 'Reservation submitted successfully!');
    }
}
