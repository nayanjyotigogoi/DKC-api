<?php

namespace App\Filament\Resources\Learning\LessonResource\Pages;

use App\Filament\Resources\Learning\LessonResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLesson extends EditRecord
{
    protected static string $resource = LessonResource::class;

    protected function getActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
}
