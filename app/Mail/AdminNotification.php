<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Generic admin notification sent to connect@dibrugarhkoreanclub.com
 * for every form submission (application, course interest, etc.)
 */
class AdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $type,        // 'application' | 'course_interest'
        public string $fromName,
        public string $fromEmail,
        public array  $details,     // key-value pairs to display in the email
    ) {}

    public function envelope(): Envelope
    {
        $label = match ($this->type) {
            'application'     => 'New Membership Application',
            'course_interest' => 'New Course Interest Registration',
            'contact'         => 'New Contact Message',
            default           => 'New Form Submission',
        };

        return new Envelope(
            subject: "[DKC] {$label} — {$this->fromName}",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.admin-notification',
        );
    }
}
