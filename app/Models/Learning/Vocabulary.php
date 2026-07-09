<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vocabulary extends Model
{
    use SoftDeletes;

    protected $table = 'learning_vocabulary';

    protected $fillable = [
        'korean',
        'romanization',
        'assamese',
        'english',
        'part_of_speech',
        'level',
        'example_ko',
        'example_as',
        'example_en',
        'audio_id',
        'example_audio_id',
    ];

    public function audio(): BelongsTo
    {
        return $this->belongsTo(LearningAudio::class, 'audio_id');
    }

    public function exampleAudio(): BelongsTo
    {
        return $this->belongsTo(LearningAudio::class, 'example_audio_id');
    }

    public function lessons(): BelongsToMany
    {
        return $this->belongsToMany(Lesson::class, 'lesson_vocabulary', 'vocabulary_id', 'lesson_id')
                    ->withPivot('order_index')
                    ->orderByPivot('order_index');
    }
}
