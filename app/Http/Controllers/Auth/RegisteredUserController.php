<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Services\SmsService; // Ensure SmsService is imported
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    protected $smsService;

    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'max:20'], // Add validation for phone
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone, // Save phone number
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Send SMS notification
        try {
            $this->smsService->sendSms(
                $user->phone,
                'Welcome to Sizzles and Sage! Thank you for registering.',
                'SizzlesAndSage'
            );
        } catch (\Exception $e) {
            // Handle SMS sending error
            report($e);
        }

        return redirect(route('dashboard', absolute: false));
    }
}
