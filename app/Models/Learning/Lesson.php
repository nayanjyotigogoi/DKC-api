<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lesson extends Model
{
    use SoftDeletes;

    protected $table = 'learning_lessons';

    protected $fillable = [
        'module_id',
        'title_en',
        'title_as',
        'slug',
        'level',
        'order_index',
        'status',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'order_index'  => 'integer',
    ];

    // ─── Relationships ────────────────────────────────────────────────────────

    public function module(): BelongsTo
    {
        return $this->belongsTo(LearningModule::class, 'module_id');
    }

    public function vocabulary(): BelongsToMany
    {
        return $this->belongsToMany(Vocabulary::class, 'lesson_vocabulary', 'lesson_id', 'vocabulary_id')
                    ->withPivot('order_index')
                    ->orderByPivot('order_index');
    }

    public function grammar(): BelongsToMany
    {
        return $this->belongsToMany(GrammarPoint::class, 'lesson_grammar', 'lesson_id', 'grammar_id')
                    ->withPivot('order_index')
                    ->orderByPivot('order_index');
    }

    public function conversations(): BelongsToMany
    {
        return $this->belongsToMany(Conversation::class, 'lesson_conversations', 'lesson_id', 'conversation_id')
                    ->withPivot('order_index')
                    ->orderByPivot('order_index');
    }

    public function culturalNotes(): BelongsToMany
    {
        return $this->belongsToMany(CulturalNote::class, 'lesson_cultural_notes', 'lesson_id', 'cultural_note_id')
                    ->withPivot('order_index')
                    ->orderByPivot('order_index');
    }

    public function quizQuestions(): BelongsToMany
    {
        return $this->belongsToMany(QuizQuestion::class, 'lesson_quiz_questions', 'lesson_id', 'quiz_question_id')
                    ->withPivot('order_index')
                    ->orderByPivot('order_index');
    }

    // ─── Completeness check ───────────────────────────────────────────────────

    /**
     * A lesson is complete enough to publish when it has at least one
     * vocabulary entry, one grammar point, one conversation, and one quiz question.
     */
    public function isPublishable(): bool
    {
        return $this->vocabulary()->exists()
            && $this->grammar()->exists()
            && $this->conversations()->exists()
            && $this->quizQuestions()->exists();
    }

    // ─── Navigation helpers ───────────────────────────────────────────────────

    public function previousLesson(): ?self
    {
        return self::where('module_id', $this->module_id)
                   ->where('status', 'published')
                   ->where('order_index', '<', $this->order_index)
                   ->orderBy('order_index', 'desc')
                   ->first();
    }

    public function nextLesson(): ?self
    {
        return self::where('module_id', $this->module_id)
                   ->where('status', 'published')
                   ->where('order_index', '>', $this->order_index)
                   ->orderBy('order_index')
                   ->first();
    }
}
