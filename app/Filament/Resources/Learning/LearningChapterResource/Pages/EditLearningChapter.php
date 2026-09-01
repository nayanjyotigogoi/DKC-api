<?php

namespace App\Filament\Resources\Learning\LearningChapterResource\Pages;

use App\Filament\Resources\Learning\LearningChapterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLearningChapter extends EditRecord
{
    protected static string $resource = LearningChapterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
