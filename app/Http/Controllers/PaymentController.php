<?php

namespace App\Http\Controllers;

use App\Services\MpesaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Order;

class PaymentController extends Controller
{
    protected $mpesaService;

    public function __construct(MpesaService $mpesaService)
    {
        $this->mpesaService = $mpesaService;
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string',
            'amount' => 'required|numeric|min:1',
        ]);

        $phoneNumber = $request->input('phone_number');
        $amount = $request->input('amount');

        // Assuming 'Order1234' and 'Payment for order' are placeholders
        $response = $this->mpesaService->stkPush($phoneNumber, $amount, 'Order1234', 'Payment for order');

        return response()->json($response);
    }

    public function mpesaCallback(Request $request)
    {
        // Log the entire request for debugging (optional)
        Log::info('M-Pesa Callback Received:', $request->all());

        // Parse the callback data
        $body = json_decode($request->getContent(), true);

        // Extract necessary details from the callback
        $resultCode = $body['Body']['stkCallback']['ResultCode'];
        $checkoutRequestID = $body['Body']['stkCallback']['CheckoutRequestID'];

        // Find the order associated with the checkout request ID
        $order = Order::where('checkout_request_id', $checkoutRequestID)->first();

        if (!$order) {
            Log::error('Order not found for Checkout Request ID: ' . $checkoutRequestID);
            return response()->json(['error' => 'Order not found'], 404);
        }

        // Process based on M-Pesa result code
        if ($resultCode == 0) {
            // Payment successful
            $mpesaReceiptNumber = $body['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value'];
            $transactionDate = $body['Body']['stkCallback']['CallbackMetadata']['Item'][3]['Value'];

            // Update the order status and save payment details
            $order->status = 'paid';
            $order->mpesa_receipt_number = $mpesaReceiptNumber;
            $order->transaction_date = now()->parse($transactionDate);
            $order->save();

            Log::info('Payment successful for Order ID: ' . $order->id);

            return response()->json(['message' => 'Payment received and order updated'], 200);
        } else {
            // Payment failed
            Log::error('Payment failed for Order ID: ' . $order->id);
            $order->status = 'failed';
            $order->save();

            return response()->json(['error' => 'Payment failed'], 400);
        }
    }
}
