<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\AdminNotification;
use App\Mail\ApplicationReceived;
use App\Models\MemberApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $isStudent  = in_array($request->current_status, ['du_student', 'other_student']);
        $isWorking  = $request->current_status === 'working';
        $isOther    = $request->current_status === 'other';

        $validator = Validator::make($request->all(), [
            // Honeypot — must be absent or empty; bots fill it
            'website'                => 'present|max:0',

            'full_name'              => 'required|string|max:255',
            'email'                  => 'required|email|max:255|unique:member_applications,email',
            'phone'                  => 'nullable|string|max:20',
            'current_status'         => 'required|in:du_student,other_student,working,other',

            // Other-institution students
            'institution'            => 'nullable|string|max:255',

            // Working professionals
            'occupation'             => 'nullable|string|max:255',
            'organization'           => 'nullable|string|max:255',

            // Academic fields — only required for students
            'department'             => ($isStudent ? 'required' : 'nullable') . '|string|max:255',
            'course'                 => 'nullable|string|max:255',
            'year_of_study'          => ($isStudent ? 'required' : 'nullable') . '|string|max:50',

            'why_join'               => 'required|string|min:20|max:2000',
            'favourite_korean_thing' => 'nullable|string|max:255',
            'how_heard'              => 'required|in:social_media,friend,notice_board,event,other',
            'how_heard_other'        => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $application = MemberApplication::create($validator->validated());

        $statusMap = [
            'du_student'    => 'DU Student',
            'other_student' => 'Other Student',
            'working'       => 'Working Professional',
            'other'         => 'Other',
        ];

        $howHeardMap = [
            'social_media'  => 'Social Media',
            'friend'        => 'Friend / Word of Mouth',
            'notice_board'  => 'Notice Board',
            'event'         => 'Event',
            'other'         => 'Other',
        ];

        try {
            // Auto-reply to the applicant
            Mail::to($application->email)->send(new ApplicationReceived($application));

            // Notify the club inbox
            Mail::to(config('mail.admin_address', 'connect@dibrugarhkoreanclub.com'))
                ->send(new AdminNotification(
                    type: 'application',
                    fromName: $application->full_name,
                    fromEmail: $application->email,
                    details: [
                        'Phone'                 => $application->phone,
                        'Status'                => $statusMap[$application->current_status] ?? $application->current_status,
                        'Department'            => $application->department,
                        'Course'                => $application->course,
                        'Year of Study'         => $application->year_of_study,
                        'Institution'           => $application->institution,
                        'Occupation'            => $application->occupation,
                        'Organization'          => $application->organization,
                        'How They Heard'        => $howHeardMap[$application->how_heard] ?? $application->how_heard,
                        'Favourite Korean Thing'=> $application->favourite_korean_thing,
                        'Why Join'              => $application->why_join,
                        'Submitted At'          => $application->created_at->format('F j, Y \a\t g:i A'),
                    ],
                ));
        } catch (\Exception $e) {
            logger()->error('Application email failed: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Application submitted successfully! Check your email for confirmation.',
            'data'    => ['id' => $application->id, 'name' => $application->full_name],
        ], 201);
    }
}
