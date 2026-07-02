<?php

namespace App\Filament\Resources\GoodieResource\Pages;

use App\Filament\Resources\GoodieResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGoodie extends EditRecord
{
    protected static string $resource = GoodieResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
