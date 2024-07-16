<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PaymentController;

// Public routes
Route::get('/', function () {
    return view('auth.register'); // Direct users to register page
})->name('register-web'); // Updated route name to avoid conflict

Route::get('/login', function () {
    return view('auth.login'); // Direct users to login page first
})->name('login');

// Protected routes (require authentication)
Route::middleware(['auth', 'verified'])->group(function () {
    // Home page after successful authentication
    Route::get('/home', [PageController::class, 'home'])->name('home');

    // Other public pages
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/menu', [PageController::class, 'menu'])->name('menu');
    Route::get('/book', [PageController::class, 'book'])->name('book');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');

    // Dashboard (redirect to home page)
    Route::get('/dashboard', function () {
        return redirect()->route('home');
    })->name('dashboard');

    // Profile edit/update/delete routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Form submissions
    Route::post('/submit-reservation', [ReservationController::class, 'submit'])->name('submitReservation');
    Route::post('/submit-contact-form', [ContactController::class, 'submit'])->name('submitContact');

    // Menu order submission
    Route::post('/place-order', [MenuController::class, 'placeOrder'])->name('placeOrder');

    // Newsletter subscription
    Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('subscribe');

    // User profile page
    Route::get('/userprofile', 'App\Http\Controllers\UserProfileController@show')->name('userprofile');
    Route::get('/user/profile', [UserProfileController::class, 'show'])->name('user.profile');

    // Payment routes
    Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
    Route::post('/payment/callback', [PaymentController::class, 'mpesaCallback'])->name('mpesa.callback');
});

// Authentication routes (Breeze default)
require __DIR__.'/auth.php';
