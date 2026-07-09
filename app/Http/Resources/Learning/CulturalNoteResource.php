<?php

namespace App\Http\Resources\Learning;

use Illuminate\Http\Resources\Json\JsonResource;

class CulturalNoteResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'                 => $this->id,
            'title_en'           => $this->title_en,
            'title_as'           => $this->title_as,
            'body_en'            => $this->body_en,
            'body_as'            => $this->body_as,
            'category'           => $this->category,
            'image_url'          => $this->image_url,
            'related_vocabulary' => VocabularyResource::collection(
                $this->relatedVocabulary()
            ),
        ];
    }
}
