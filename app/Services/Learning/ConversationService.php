<?php

namespace App\Services\Learning;

use App\Models\Learning\Conversation;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ConversationService
{
    public function paginate(array $filters = [], int $perPage = 24): LengthAwarePaginator
    {
        $query = Conversation::orderBy('title_en');

        if (!empty($filters['level'])) {
            $query->where('level', $filters['level']);
        }

        if (!empty($filters['search'])) {
            $term = $filters['search'];
            $query->where(function ($q) use ($term) {
                $q->where('title_ko', 'like', "%{$term}%")
                  ->orWhere('title_en', 'like', "%{$term}%")
                  ->orWhere('title_as', 'like', "%{$term}%");
            });
        }

        return $query->paginate($perPage);
    }

    public function findById(int $id): Conversation
    {
        return Conversation::with('lines.audio')->findOrFail($id);
    }
}
