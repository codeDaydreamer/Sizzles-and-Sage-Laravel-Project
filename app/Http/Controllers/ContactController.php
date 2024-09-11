<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Log incoming request headers and data for debugging
        \Log::info('Request Headers:', $request->headers->all());
        \Log::info('Request Data:', $request->all());

        // Define validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422); // Return validation errors with status code 422 Unprocessable Entity
        }

        // Create a new Contact record
        $contact = ContactMessage::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        // Return a success response
        return response()->json([
            'success' => 'Message sent successfully.',
        ]);
    }
}
