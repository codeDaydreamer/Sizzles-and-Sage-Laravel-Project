<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MpesaService
{
    protected $consumerKey;
    protected $consumerSecret;
    protected $shortCode;
    protected $passkey;
    protected $env;
    protected $callbackUrl;

    protected $accessToken;

    public function __construct()
    {
        $this->consumerKey = config('services.mpesa.consumer_key');
        $this->consumerSecret = config('services.mpesa.consumer_secret');
        $this->shortCode = config('services.mpesa.shortcode');
        $this->passkey = config('services.mpesa.passkey');
        $this->env = config('services.mpesa.env');
        $this->callbackUrl = config('services.mpesa.callback_url');
    }

    public function getAccessToken()
    {
        if (!$this->accessToken) {
            $url = $this->env === 'sandbox'
                ? 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
                : 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

            $response = Http::withBasicAuth($this->consumerKey, $this->consumerSecret)->get($url);

            if ($response->successful()) {
                $this->accessToken = $response->json()['access_token'];
            } else {
                Log::error('Failed to retrieve M-Pesa access token: ' . $response->body());
                return null; // Handle error appropriately
            }
        }

        return $this->accessToken;
    }

    public function stkPush($phoneNumber, $amount, $accountReference, $transactionDesc)
    {
        $url = $this->env === 'sandbox'
            ? 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest'
            : 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        $accessToken = $this->getAccessToken();

        if (!$accessToken) {
            return ['error' => 'Failed to retrieve access token.'];
        }

        $timestamp = now()->format('YmdHis');
        $password = base64_encode($this->shortCode . $this->passkey . $timestamp);

        $response = Http::withToken($accessToken)->post($url, [
            'BusinessShortCode' => $this->shortCode,
            'Password' => $password,
            'Timestamp' => $timestamp,
            'TransactionType' => 'CustomerPayBillOnline', // Adjust as needed (e.g., CustomerBuyGoodsOnline for Till Numbers)
            'Amount' => $amount,
            'PartyA' => $phoneNumber,
            'PartyB' => $this->shortCode,
            'PhoneNumber' => $phoneNumber,
            'CallBackURL' => $this->callbackUrl,
            'AccountReference' => $accountReference,
            'TransactionDesc' => $transactionDesc,
        ]);

        if ($response->successful()) {
            return $response->json();
        } else {
            Log::error('Failed to initiate STK push: ' . $response->body());
            return ['error' => 'Failed to initiate STK push.'];
        }
    }

    public function handleCallback(array $data)
    {
        // Handle the callback data here based on the documented structure
        // Example of handling callback data
        if (isset($data['Body']['stkCallback']['ResultCode'])) {
            if ($data['Body']['stkCallback']['ResultCode'] == 0) {
                // Payment successful, process the data
                return $data['Body']['stkCallback'];
            } else {
                // Handle failed transaction
                Log::error('STK push failed: ' . $data['Body']['stkCallback']['ResultDesc']);
                return null;
            }
        } else {
            Log::error('Invalid STK callback data received.');
            return null;
        }
    }
}
