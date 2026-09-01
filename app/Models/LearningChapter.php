<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LearningChapter extends Model
{
    protected $fillable = [
        'slug', 'number', 'title_en', 'title_ko', 'description',
        'accent_color', 'tint_color', 'border_color', 'icon',
        'is_published', 'sort_order',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(LearningChapterItem::class, 'chapter_id')
                    ->orderBy('sort_order');
    }

    public function conversations(): HasMany
    {
        return $this->hasMany(LearningChapterConversation::class, 'chapter_id')
                    ->orderBy('sort_order');
    }

    /** Items grouped by section, preserving sort_order within each group. */
    public function itemsBySection(): array
    {
        return $this->items->groupBy('section')->toArray();
    }
}
