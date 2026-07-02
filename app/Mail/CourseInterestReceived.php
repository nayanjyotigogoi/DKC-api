<?php

namespace App\Mail;

use App\Models\CourseInterest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CourseInterestReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public CourseInterest $interest) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'We\'ve noted your interest — Dibrugarh Korean Club',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.course-interest-received',
        );
    }
}
