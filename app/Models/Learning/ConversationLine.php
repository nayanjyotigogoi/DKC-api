<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConversationLine extends Model
{
    protected $table = 'conversation_lines';

    protected $fillable = [
        'conversation_id',
        'order_index',
        'speaker_label',
        'text_ko',
        'romanization',
        'translation_as',
        'translation_en',
        'audio_id',
    ];

    protected $casts = [
        'order_index' => 'integer',
    ];

    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class, 'conversation_id');
    }

    public function audio(): BelongsTo
    {
        return $this->belongsTo(LearningAudio::class, 'audio_id');
    }
}
