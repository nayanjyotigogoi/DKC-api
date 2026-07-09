<?php

namespace App\Http\Resources\Learning;

use Illuminate\Http\Resources\Json\JsonResource;

class ConversationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'       => $this->id,
            'title_ko' => $this->title_ko,
            'title_en' => $this->title_en,
            'title_as' => $this->title_as,
            'scene_en' => $this->scene_en,
            'scene_as' => $this->scene_as,
            'level'    => $this->level,
            'speakers' => $this->speakers ?? [],
            'lines'    => ConversationLineResource::collection(
                $this->whenLoaded('lines')
            ),
        ];
    }
}
