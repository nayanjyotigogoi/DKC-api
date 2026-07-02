<?php

namespace App\Filament\Resources\KoreanPhraseResource\Pages;

use App\Filament\Resources\KoreanPhraseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKoreanPhrase extends EditRecord
{
    protected static string $resource = KoreanPhraseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
