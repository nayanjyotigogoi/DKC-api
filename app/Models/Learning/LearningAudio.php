<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LearningAudio extends Model
{
    use SoftDeletes;

    protected $table = 'learning_audio';

    protected $fillable = [
        'filename',
        'url',
        'duration_ms',
        'type',
        'speed_variant',
        'speaker_gender',
        'verified',
        'uploaded_by',
    ];

    protected $casts = [
        'verified'    => 'boolean',
        'duration_ms' => 'integer',
    ];

    public function uploader(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'uploaded_by');
    }
}
