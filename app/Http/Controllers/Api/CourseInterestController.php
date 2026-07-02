<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\AdminNotification;
use App\Mail\CourseInterestReceived;
use App\Models\CourseInterest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CourseInterestController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'website'        => 'present|max:0',
            'course'         => 'required|in:basic_korean,topik_ii',
            'full_name'      => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'phone'          => 'nullable|string|max:20',
            'current_status' => 'required|in:du_student,other_student,working,other',
            'department'     => 'nullable|string|max:255',
            'year_of_study'  => 'nullable|string|max:50',
            'why_interested' => 'nullable|string|max:1000',
            'korean_level'   => 'required|in:none,beginner,intermediate',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $exists = CourseInterest::where('email', $request->email)
                                ->where('course', $request->course)
                                ->exists();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'You have already registered interest in this course.',
            ], 409);
        }

        $data = $validator->validated();
        $data['ip_address'] = $request->ip();
        unset($data['website']);

        $interest = CourseInterest::create($data);

        $courseLabel = $interest->course === 'basic_korean' ? 'Basic Korean Learning' : 'TOPIK II Preparation';

        $statusMap = [
            'du_student'    => 'DU Student',
            'other_student' => 'Other Student',
            'working'       => 'Working Professional',
            'other'         => 'Other',
        ];

        $levelMap = [
            'none'         => 'No Korean yet',
            'beginner'     => 'Beginner',
            'intermediate' => 'Intermediate',
        ];

        try {
            // Auto-reply to the person who submitted
            Mail::to($interest->email)->send(new CourseInterestReceived($interest));

            // Notify the club inbox
            Mail::to(config('mail.admin_address', 'connect@dibrugarhkoreanclub.com'))
                ->send(new AdminNotification(
                    type: 'course_interest',
                    fromName: $interest->full_name,
                    fromEmail: $interest->email,
                    details: [
                        'Course'         => $courseLabel,
                        'Phone'          => $interest->phone,
                        'Status'         => $statusMap[$interest->current_status] ?? $interest->current_status,
                        'Department'     => $interest->department,
                        'Year of Study'  => $interest->year_of_study,
                        'Korean Level'   => $levelMap[$interest->korean_level] ?? $interest->korean_level,
                        'Why Interested' => $interest->why_interested,
                        'Submitted At'   => $interest->created_at->format('F j, Y \a\t g:i A'),
                        'IP Address'     => $interest->ip_address,
                    ],
                ));
        } catch (\Exception $e) {
            logger()->error('Course interest email failed: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Thank you! We\'ve recorded your interest and will be in touch when the course opens.',
        ], 201);
    }
}
