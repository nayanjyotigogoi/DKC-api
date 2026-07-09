<?php

namespace App\Http\Resources\Learning;

use Illuminate\Http\Resources\Json\JsonResource;

class ConversationLineResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'             => $this->id,
            'order_index'    => $this->order_index,
            'speaker_label'  => $this->speaker_label,
            'text_ko'        => $this->text_ko,
            'romanization'   => $this->romanization,
            'translation_as' => $this->translation_as,
            'translation_en' => $this->translation_en,
            'audio'          => $this->whenLoaded('audio', fn () => new AudioResource($this->audio)),
        ];
    }
}
