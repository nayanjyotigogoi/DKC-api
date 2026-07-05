<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\AdminNotification;
use App\Mail\EventRegistrationReceived;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EventRegistrationController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'website'     => 'present|max:0',
            'event_slug'  => 'required|string|max:255',
            'event_title' => 'required|string|max:255',
            'full_name'   => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'phone'       => 'nullable|string|max:20',
            'department'  => 'nullable|string|max:255',
            'message'     => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $registration = EventRegistration::create($validator->validated());

        try {
            Mail::to($registration->email)->send(new EventRegistrationReceived($registration));

            Mail::to(config('mail.admin_address', 'connect@dibrugarhkoreanclub.com'))
                ->send(new AdminNotification(
                    type: 'event',
                    fromName: $registration->full_name,
                    fromEmail: $registration->email,
                    details: [
                        'Event'       => $registration->event_title,
                        'Phone'       => $registration->phone,
                        'Department'  => $registration->department,
                        'Message'     => $registration->message,
                        'Registered At' => $registration->created_at->format('F j, Y \a\t g:i A'),
                    ],
                ));
        } catch (\Exception $e) {
            logger()->error('Event registration email failed: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Registration successful! Check your email for confirmation.',
            'data'    => ['id' => $registration->id, 'name' => $registration->full_name],
        ], 201);
    }
}
