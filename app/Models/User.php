<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\FilamentUser;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_path',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    /** Only active users with a recognised role can access Filament. */
    public function canAccessFilament(): bool
    {
        return $this->is_active && $this->hasAnyRole([
            'super_admin',
            'admin',
            'editor',
            'academic_lead',
            'study_coordinator',
        ]);
    }

    public function isSuperAdmin(): bool
    {
        return $this->hasRole('super_admin');
    }

    public function isAdmin(): bool
    {
        return $this->hasAnyRole(['super_admin', 'admin']);
    }

    /** Whether this user may access the Learning Management panel area. */
    public function canManageLearning(): bool
    {
        return $this->hasAnyRole(['super_admin', 'admin', 'academic_lead', 'study_coordinator']);
    }
}
