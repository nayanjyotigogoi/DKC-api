<?php

namespace App\Filament\Resources\Learning\VocabularyResource\Pages;

use App\Filament\Resources\Learning\VocabularyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVocabulary extends ListRecords
{
    protected static string $resource = VocabularyResource::class;

    protected function getActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
