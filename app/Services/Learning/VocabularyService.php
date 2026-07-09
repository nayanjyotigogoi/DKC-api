<?php

namespace App\Services\Learning;

use App\Models\Learning\Vocabulary;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class VocabularyService
{
    public function paginate(array $filters = [], int $perPage = 24): LengthAwarePaginator
    {
        $query = Vocabulary::with(['audio', 'exampleAudio'])
                           ->orderBy('english');

        if (!empty($filters['level'])) {
            $query->where('level', $filters['level']);
        }

        if (!empty($filters['part_of_speech'])) {
            $query->where('part_of_speech', $filters['part_of_speech']);
        }

        if (!empty($filters['search'])) {
            $term = $filters['search'];
            $query->where(function ($q) use ($term) {
                $q->where('korean', 'like', "%{$term}%")
                  ->orWhere('romanization', 'like', "%{$term}%")
                  ->orWhere('assamese', 'like', "%{$term}%")
                  ->orWhere('english', 'like', "%{$term}%");
            });
        }

        return $query->paginate($perPage);
    }

    public function findById(int $id): Vocabulary
    {
        return Vocabulary::with(['audio', 'exampleAudio'])->findOrFail($id);
    }
}
