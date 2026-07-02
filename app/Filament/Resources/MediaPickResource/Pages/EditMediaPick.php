<?php

namespace App\Filament\Resources\MediaPickResource\Pages;

use App\Filament\Resources\MediaPickResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMediaPick extends EditRecord
{
    protected static string $resource = MediaPickResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
