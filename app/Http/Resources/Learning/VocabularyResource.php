<?php

namespace App\Http\Resources\Learning;

use Illuminate\Http\Resources\Json\JsonResource;

class VocabularyResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'             => $this->id,
            'korean'         => $this->korean,
            'romanization'   => $this->romanization,
            'assamese'       => $this->assamese,
            'english'        => $this->english,
            'part_of_speech' => $this->part_of_speech,
            'level'          => $this->level,
            'example_ko'     => $this->example_ko,
            'example_as'     => $this->example_as,
            'example_en'     => $this->example_en,
            'audio'          => $this->whenLoaded('audio', fn () => new AudioResource($this->audio)),
            'example_audio'  => $this->whenLoaded('exampleAudio', fn () => new AudioResource($this->exampleAudio)),
        ];
    }
}
