<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseInterest extends Model
{
    protected $fillable = [
        'course',
        'full_name',
        'email',
        'phone',
        'current_status',
        'department',
        'year_of_study',
        'why_interested',
        'korean_level',
        'ip_address',
    ];

    public function getCourseLabelAttribute(): string
    {
        return match($this->course) {
            'basic_korean' => 'Basic Korean Learning',
            'topik_ii'     => 'TOPIK II Preparation',
            default        => $this->course,
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match($this->current_status) {
            'du_student'    => 'DU Student',
            'other_student' => 'Other Student',
            'working'       => 'Working Professional',
            'other'         => 'Other',
            default         => $this->current_status,
        };
    }
}
