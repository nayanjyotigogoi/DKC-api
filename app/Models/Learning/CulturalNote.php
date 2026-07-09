<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CulturalNote extends Model
{
    use SoftDeletes;

    protected $table = 'learning_cultural_notes';

    protected $fillable = [
        'title_en',
        'title_as',
        'body_en',
        'body_as',
        'level',
        'category',
        'tags',
        'related_vocabulary_ids',
        'image_path',
    ];

    protected $casts = [
        'related_vocabulary_ids' => 'array',
        'tags'                   => 'array',
    ];

    public function lessons(): BelongsToMany
    {
        return $this->belongsToMany(Lesson::class, 'lesson_cultural_notes', 'cultural_note_id', 'lesson_id')
                    ->withPivot('order_index')
                    ->orderByPivot('order_index');
    }

    public function relatedVocabulary()
    {
        $ids = $this->related_vocabulary_ids ?? [];
        if (empty($ids)) {
            return collect();
        }
        return Vocabulary::whereIn('id', $ids)->get();
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->image_path
            ? asset('storage/' . $this->image_path)
            : null;
    }
}
