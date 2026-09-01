<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LearningChapterItem extends Model
{
    protected $fillable = [
        'chapter_id', 'section', 'korean', 'speak_text',
        'romanization', 'english', 'assamese', 'meta',
        'sort_order', 'is_active',
    ];

    protected $casts = [
        'meta'      => 'array',
        'is_active' => 'boolean',
    ];

    public function chapter(): BelongsTo
    {
        return $this->belongsTo(LearningChapter::class, 'chapter_id');
    }

    /** Returns the text that should be sent to TTS. */
    public function getSpeakTextEffectiveAttribute(): string
    {
        return $this->speak_text ?? $this->korean;
    }
}
