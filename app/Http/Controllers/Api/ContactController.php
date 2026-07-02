<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\AdminNotification;
use App\Mail\ContactReceived;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'website' => 'present|max:0', // honeypot
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|min:10|max:3000',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $data = $validator->validated();

        $contact = Contact::create([
            'name'       => $data['name'],
            'email'      => $data['email'],
            'subject'    => $data['subject'] ?? null,
            'message'    => $data['message'],
            'ip_address' => $request->ip(),
        ]);

        try {
            // Auto-reply to the sender
            Mail::to($data['email'])->send(new ContactReceived(
                senderName: $data['name'],
                contactSubject: $data['subject'] ?? '',
                contactMessage: $data['message'],
            ));

            // Forward full message to the club inbox
            Mail::to(config('mail.admin_address', 'connect@dibrugarhkoreanclub.com'))
                ->send(new AdminNotification(
                    type: 'contact',
                    fromName: $data['name'],
                    fromEmail: $data['email'],
                    details: [
                        'Subject' => $data['subject'] ?? '(none)',
                        'Message' => $data['message'],
                        'Sent At' => now()->format('F j, Y \a\t g:i A'),
                        'IP'      => $request->ip(),
                    ],
                ));
        } catch (\Exception $e) {
            logger()->error('Contact email failed: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Message sent! We\'ll get back to you within 48 hours.',
        ], 201);
    }
}
