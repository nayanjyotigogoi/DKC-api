<?php

namespace App\Http\Resources\Learning;

use Illuminate\Http\Resources\Json\JsonResource;

/** Lightweight resource for lesson list views — no full content loading. */
class LessonCardResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'                  => $this->id,
            'module_id'           => $this->module_id,
            'title_en'            => $this->title_en,
            'title_as'            => $this->title_as,
            'slug'                => $this->slug,
            'level'               => $this->level,
            'order_index'         => $this->order_index,
            'status'              => $this->status,
            'vocabulary_count'    => $this->vocabulary_count    ?? 0,
            'grammar_count'       => $this->grammar_count        ?? 0,
            'conversation_count'  => $this->conversations_count  ?? 0,
            'quiz_count'          => $this->quiz_questions_count ?? 0,
            'published_at'        => $this->published_at?->toIso8601String(),
        ];
    }
}
