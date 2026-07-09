<?php

namespace App\Filament\Resources\Learning\GrammarResource\Pages;

use App\Filament\Resources\Learning\GrammarResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGrammar extends ListRecords
{
    protected static string $resource = GrammarResource::class;

    protected function getActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
