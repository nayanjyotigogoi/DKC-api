<?php

namespace App\Models\Learning;

use App\Models\LearningChapter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Conversation extends Model
{
    use SoftDeletes;

    protected $table = 'learning_conversations';

    protected $fillable = [
        'chapter_id',
        'title_ko',
        'title_en',
        'title_as',
        'scene_en',
        'scene_as',
        'context_en',
        'context_as',
        'level',
        'speakers',
        'tags',
    ];

    protected $casts = [
        'speakers' => 'array',
        'tags'     => 'array',
    ];

    public function chapter(): BelongsTo
    {
        return $this->belongsTo(LearningChapter::class, 'chapter_id');
    }

    public function lines(): HasMany
    {
        return $this->hasMany(ConversationLine::class, 'conversation_id')
                    ->orderBy('order_index');
    }

    public function lessons(): BelongsToMany
    {
        return $this->belongsToMany(Lesson::class, 'lesson_conversations', 'conversation_id', 'lesson_id')
                    ->withPivot('order_index')
                    ->orderByPivot('order_index');
    }
}
