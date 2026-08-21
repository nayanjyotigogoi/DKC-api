<?php

namespace App\Mail;

use App\Models\MemberApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationApproved extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public MemberApplication $application) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🎊 You\'re In! Welcome to Dibrugarh Korean Club!',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.application-approved',
        );
    }
}
