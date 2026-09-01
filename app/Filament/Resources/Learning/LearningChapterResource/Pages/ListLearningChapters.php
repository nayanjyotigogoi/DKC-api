<?php

namespace App\Filament\Resources\Learning\LearningChapterResource\Pages;

use App\Filament\Resources\Learning\LearningChapterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLearningChapters extends ListRecords
{
    protected static string $resource = LearningChapterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
