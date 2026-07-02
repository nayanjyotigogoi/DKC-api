<?php

namespace App\Filament\Resources\FunFactResource\Pages;

use App\Filament\Resources\FunFactResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFunFact extends EditRecord
{
    protected static string $resource = FunFactResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
