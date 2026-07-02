<?php

namespace App\Filament\Resources\GoodieResource\Pages;

use App\Filament\Resources\GoodieResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGoodies extends ListRecords
{
    protected static string $resource = GoodieResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
