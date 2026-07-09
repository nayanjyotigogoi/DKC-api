<?php

namespace App\Http\Resources\Learning;

use Illuminate\Http\Resources\Json\JsonResource;

class QuizQuestionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'             => $this->id,
            'type'           => $this->type,
            'question_text'  => $this->question_text,
            'options'        => $this->options ?? [],
            'correct_index'  => $this->correct_index,
            'explanation_en' => $this->explanation_en,
            'explanation_as' => $this->explanation_as,
            'audio'          => $this->whenLoaded('audio', fn () => new AudioResource($this->audio)),
        ];
    }
}
