<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class QuizQuestion extends Model
{
    use SoftDeletes;

    protected $table = 'learning_quiz_questions';

    protected $fillable = [
        'type',
        'question_text',
        'options',
        'correct_index',
        'explanation_en',
        'explanation_as',
        'level',
        'audio_id',
        'source_vocab_id',
        'source_grammar_id',
    ];

    protected $casts = [
        'options'       => 'array',
        'correct_index' => 'integer',
    ];

    public function audio(): BelongsTo
    {
        return $this->belongsTo(LearningAudio::class, 'audio_id');
    }

    public function sourceVocabulary(): BelongsTo
    {
        return $this->belongsTo(Vocabulary::class, 'source_vocab_id');
    }

    public function sourceGrammar(): BelongsTo
    {
        return $this->belongsTo(GrammarPoint::class, 'source_grammar_id');
    }

    public function lessons(): BelongsToMany
    {
        return $this->belongsToMany(Lesson::class, 'lesson_quiz_questions', 'quiz_question_id', 'lesson_id')
                    ->withPivot('order_index')
                    ->orderByPivot('order_index');
    }
}
