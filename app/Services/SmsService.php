<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SmsService
{
    protected $url;
    protected $token;

    public function __construct()
    {
        $this->url = env('TECHSULT_SMS_URL');
        $this->token = env('TECHSULT_API_TOKEN');
    }

    public function sendSms($recipient, $message, $sender_id, $scheduleTime = null)
    {
        if (!$this->url || !$this->token) {
            throw new \Exception('Techsult SMS URL or token is not set.');
        }

        $response = Http::withToken($this->token)
            ->accept('application/json')
            ->post($this->url, [
                'recipient' => $recipient,
                'sender_id' => $sender_id,
                'type' => 'plain',
                'message' => $message,
                'schedule_time' => $scheduleTime,
            ]);

        if ($response->successful()) {
            return $response->json();
        } else {
            throw new \Exception('Failed to send SMS: ' . $response->body());
        }
    }

    public function getSmsStatus($messageId)
    {
        if (!$this->url || !$this->token) {
            throw new \Exception('Techsult SMS URL or token is not set.');
        }

        $statusUrl = "{$this->url}/$messageId";

        $response = Http::withToken($this->token)
            ->accept('application/json')
            ->get($statusUrl);

        if ($response->successful()) {
            return $response->json();
        } else {
            throw new \Exception('Failed to get SMS status: ' . $response->body());
        }
    }

    public function getAllMessages()
    {
        if (!$this->url || !$this->token) {
            throw new \Exception('Techsult SMS URL or token is not set.');
        }

        $response = Http::withToken($this->token)
            ->accept('application/json')
            ->get("{$this->url}/");

        if ($response->successful()) {
            return $response->json();
        } else {
            throw new \Exception('Failed to retrieve all messages: ' . $response->body());
        }
    }
}
