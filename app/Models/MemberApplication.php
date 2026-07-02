<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberApplication extends Model
{
    protected $fillable = [
        'full_name', 'email', 'phone',
        'current_status', 'institution', 'occupation', 'organization',
        'department', 'course', 'year_of_study',
        'why_join', 'favourite_korean_thing',
        'how_heard', 'how_heard_other',
        // 'status' and 'admin_notes' are intentionally excluded — admin-only fields set via Filament
    ];
}
