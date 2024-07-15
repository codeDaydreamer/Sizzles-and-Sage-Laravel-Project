<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        // Save the subscriber's email
        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();

        return redirect()->back()->with('success', 'You have been subscribed to our newsletter!');
    }
}
