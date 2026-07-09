<?php

namespace App\Policies;

use App\Models\User;

/**
 * Gates all write operations on Learning content.
 *
 * Learning management is restricted to four roles:
 *   super_admin, admin, academic_lead, study_coordinator
 *
 * Enforcement is dual:
 *   - This policy runs on every admin write route (backend)
 *   - The Filament panel hides the navigation group for unauthorised roles (frontend)
 *
 * Authorization levels:
 *   super_admin    — full access including delete and role management
 *   admin          — full access including delete; cannot assign roles
 *   academic_lead  — create, edit, publish, manage modules; cannot delete
 *   study_coordinator — create and edit content only; cannot publish or manage modules
 */
class LearningPolicy
{
    /** Roles that may view the Learning Management area at all. */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'academic_lead', 'study_coordinator']);
    }

    /** Create new content objects (vocabulary, grammar, conversations, questions, notes). */
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'academic_lead', 'study_coordinator']);
    }

    /** Edit existing content objects. */
    public function update(User $user): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'academic_lead', 'study_coordinator']);
    }

    /** Soft-delete content objects. */
    public function delete(User $user): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin']);
    }

    /** Publish or unpublish a lesson. */
    public function publish(User $user): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'academic_lead']);
    }

    /** Create, rename, reorder, or archive modules. */
    public function manageModules(User $user): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'academic_lead']);
    }

    /** Upload and manage audio files. */
    public function manageAudio(User $user): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'academic_lead', 'study_coordinator']);
    }

    /** Restore soft-deleted records. */
    public function restore(User $user): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin']);
    }

    /** Force-delete (permanent). */
    public function forceDelete(User $user): bool
    {
        return $user->hasRole('super_admin');
    }
}
