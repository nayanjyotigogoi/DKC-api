<?php

namespace App\Filament\Resources\KoreanPhraseResource\Pages;

use App\Filament\Resources\KoreanPhraseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKoreanPhrases extends ListRecords
{
    protected static string $resource = KoreanPhraseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
