<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::post('/payment/callback', [PaymentController::class, 'mpesaCallback'])->name('mpesa.callback-api'); // Updated route name for API endpoint

