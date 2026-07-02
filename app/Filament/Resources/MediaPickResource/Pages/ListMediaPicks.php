<?php

namespace App\Filament\Resources\MediaPickResource\Pages;

use App\Filament\Resources\MediaPickResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMediaPicks extends ListRecords
{
    protected static string $resource = MediaPickResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
