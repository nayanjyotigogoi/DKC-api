<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LearningChapterConversation extends Model
{
    protected $fillable = [
        'chapter_id', 'speaker', 'korean', 'english', 'assamese',
        'speak_text', 'sort_order',
    ];

    public function chapter(): BelongsTo
    {
        return $this->belongsTo(LearningChapter::class, 'chapter_id');
    }

    public function getSpeakTextEffectiveAttribute(): string
    {
        return $this->speak_text ?? $this->korean;
    }
}
