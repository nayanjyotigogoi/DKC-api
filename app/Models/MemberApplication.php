<?php

namespace App\Models;

use App\Observers\MemberApplicationObserver;
use Illuminate\Database\Eloquent\Model;

class MemberApplication extends Model
{
    protected static function booted(): void
    {
        static::observe(MemberApplicationObserver::class);
    }


    protected $fillable = [
        'full_name', 'email', 'phone',
        'current_status', 'institution', 'occupation', 'organization',
        'department', 'course', 'year_of_study',
        'why_join', 'favourite_korean_thing',
        'how_heard', 'how_heard_other',
        'status', 'admin_notes',
    ];
}
