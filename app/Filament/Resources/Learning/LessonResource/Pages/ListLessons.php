<?php

namespace App\Filament\Resources\Learning\LessonResource\Pages;

use App\Filament\Resources\Learning\LessonResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLessons extends ListRecords
{
    protected static string $resource = LessonResource::class;

    protected function getActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
