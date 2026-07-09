<?php

namespace App\Services\Learning;

use App\Models\Learning\GrammarPoint;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GrammarService
{
    public function paginate(array $filters = [], int $perPage = 24): LengthAwarePaginator
    {
        $query = GrammarPoint::orderBy('title_en');

        if (!empty($filters['level'])) {
            $query->where('level', $filters['level']);
        }

        if (!empty($filters['category'])) {
            $query->where('category', $filters['category']);
        }

        if (!empty($filters['search'])) {
            $term = $filters['search'];
            $query->where(function ($q) use ($term) {
                $q->where('title_ko', 'like', "%{$term}%")
                  ->orWhere('title_en', 'like', "%{$term}%")
                  ->orWhere('title_as', 'like', "%{$term}%")
                  ->orWhere('pattern_formula', 'like', "%{$term}%");
            });
        }

        return $query->paginate($perPage);
    }

    public function findById(int $id): GrammarPoint
    {
        return GrammarPoint::findOrFail($id);
    }
}
