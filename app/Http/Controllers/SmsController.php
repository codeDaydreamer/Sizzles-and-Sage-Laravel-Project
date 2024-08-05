<?php

namespace App\Http\Controllers;

use App\Services\SmsService;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    protected $smsService;

    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }

    public function send(Request $request)
    {
        $request->validate([
            'recipients' => 'required|string',
            'message' => 'required|string',
            'sender_id' => 'required|string', // Added sender_id as required
            'schedule_time' => 'nullable|date_format:Y-m-d H:i',
        ]);

        $recipients = $request->input('recipients');
        $message = $request->input('message');
        $senderId = $request->input('sender_id'); // Correctly fetch sender_id
        $scheduleTime = $request->input('schedule_time');

        $response = $this->smsService->sendSms($recipients, $message, $senderId, $scheduleTime);

        return response()->json($response);
    }

    public function getStatus($uid)
    {
        try {
            $response = $this->smsService->getSmsStatus($uid);
            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


}
