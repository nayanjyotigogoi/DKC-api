<?php

namespace App\Observers;

use App\Mail\ApplicationApproved;
use App\Models\MemberApplication;
use Illuminate\Support\Facades\Mail;

class MemberApplicationObserver
{
    public function updated(MemberApplication $application): void
    {
        if (
            $application->wasChanged('status') &&
            $application->status === 'approved'
        ) {
            try {
                Mail::to($application->email)->send(new ApplicationApproved($application));
            } catch (\Exception $e) {
                logger()->error('Approval email failed for ' . $application->email . ': ' . $e->getMessage());
            }
        }
    }
}
