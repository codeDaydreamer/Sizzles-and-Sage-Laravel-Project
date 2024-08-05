<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;

// Public routes
Route::get('/', [PageController::class, 'home'])->name('home'); // Home page
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/menu', [PageController::class, 'menu'])->name('menu');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/book', [PageController::class, 'book'])->name('book');

// Authentication routes (Breeze default)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

// Protected routes (require authentication)
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard (redirect to home page)
    Route::get('/dashboard', function () {
        return redirect()->route('home');
    })->name('dashboard');

    // Profile edit/update/delete routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Reservation submission (private)
    Route::post('/submit-reservation', [ReservationController::class, 'submit'])->name('submitReservation');

    // Menu order submission
    Route::post('/place-order', [MenuController::class, 'placeOrder'])->name('placeOrder');

    // Newsletter subscription
    Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('subscribe');

    // User profile page
    Route::get('/userprofile', [UserProfileController::class, 'show'])->name('userprofile');
    Route::get('/user/profile', [UserProfileController::class, 'show'])->name('user.profile');
    Route::delete('/order/{id}', [OrderController::class, 'destroy'])->name('order.destroy');

    // Payment routes
    Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
    Route::post('/payment/callback', [PaymentController::class, 'mpesaCallback'])->name('mpesa.callback');
});
